// const API_BASE_URL = 'http://127.0.0.1:8000';
const API_BASE_URL = 'https://elementdesignagency.com/crm';

/**
 * Helper to get value from localStorage
 */
function getLeadId() {
    return localStorage.getItem('lead_id');
}

/**
 * Helper to get Package Details
 */
function getPackageDetails() {
    const pkg = localStorage.getItem('selected_package') || 'Basic';
    const amt = localStorage.getItem('selected_amount') || '35'; // Default to 35
    return { pkg, amt };
}

/**
 * Helper to set value to localStorage
 */
function setLeadId(id) {
    localStorage.setItem('lead_id', id);
}

function setPackageDetails(pkg, amt) {
    localStorage.setItem('selected_package', pkg);
    localStorage.setItem('selected_amount', amt);
}

// Function called by "Order Now" buttons 
window.selectPackage = function (pkg, amt) {
    setPackageDetails(pkg, amt);
    
        // Update Popup Price if element exists
    const popupPrice = document.getElementById('popup-price');
    if (popupPrice) {
        popupPrice.textContent = `$${amt}`; 
    }

    // Note: Modal opening is handled via data-bs-toggle in the HTML.
    // This allows us to track the package before the modal displays.
    console.log(`Package Selected: ${pkg} ($${amt})`);
};

/**
 * Generic API Fetch Wrapper
 */
async function apiRequest(endpoint, method, body) {
    try {
        const headers = {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        };

        const config = {
            method: method,
            headers: headers,
        };

        if (body) {
            config.body = JSON.stringify(body);
        }

        const response = await fetch(`${API_BASE_URL}${endpoint}`, config);

        if (!response.ok) {
            const errorText = await response.text();
            let errorData = {};
            try { errorData = JSON.parse(errorText); } catch (e) { }

            const message = errorData.message || errorData.error || `Error ${response.status}: ${errorText.substring(0, 100)}`;
            throw new Error(message);
        }

        return await response.json();
    } catch (error) {
        console.error('API Request Failed:', error);
        // Alert with the specific error message to help debugging
        alert(`Sync Error: ${error.message}`);
        throw error;
    }
}

/**
 * Step 1: Initial Contact
 */
async function submitStep1(e) {
    e.preventDefault();

    const form = e.target;
    // Using name selector to find fields within the current form
    const nameInput = form.querySelector('[name="name"]');
    const emailInput = form.querySelector('[name="email"]');
    const phoneInput = form.querySelector('[name="phone"]');
    const messageInput = form.querySelector('[name="message"]');

    const name = nameInput ? nameInput.value : '';
    const email = emailInput ? emailInput.value : '';
    const phone = phoneInput ? phoneInput.value : '';
    const message = messageInput ? messageInput.value : "Interested in Logo Design";
    const brand_id = 2;

    if (!name || !email || !phone) {
        alert('Please fill in all required fields.');
        return;
    }

    // Ensure default package is set if not already
    let { pkg, amt } = getPackageDetails();
    if (!localStorage.getItem('selected_package')) {
        setPackageDetails('Basic', '35');
    }

    const data = {
        name,
        email,
        phone,
        message,
        brand_id,
        // Send package details if API supports it, otherwise it's just stored locally
        package_name: pkg,
        package_amount: amt
    };

    try {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Submitting...';
        }

        const result = await apiRequest('/api/leads/step-1', 'POST', data);

        if (result.lead_id) {
            setLeadId(result.lead_id);
            window.location.href = 'logo-style.php';
        } else {
            alert('Failed to get lead ID from server.');
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Submit';
            }
        }
    } catch (error) {
        // Error already handled in apiRequest
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerText = 'Submit';
        }
    }
}

/**
 * Step 2: Logo Type Selection
 */
async function submitStep2() {
    const leadId = getLeadId();
    if (!leadId) {
        alert('Session expired. Please start over.');
        window.location.href = 'index.php';
        return;
    }

    const selectedRadio = document.querySelector('input[name="logo_style"]:checked');
    if (!selectedRadio) {
        alert('Please select a logo style.');
        return;
    }

    const data = {
        logo_type: selectedRadio.value
    };

    try {
        await apiRequest(`/api/leads/step-2/${leadId}`, 'POST', data);
        window.location.href = 'logo-details.php';
    } catch (error) {
        // Error handled
    }
}

/**
 * Step 3: Logo Details
 */
async function submitStep3() {
    const leadId = getLeadId();
    if (!leadId) {
        alert('Session expired. Please start over.');
        window.location.href = 'index.php';
        return;
    }

    const logoName = document.getElementById('logo_name').value;
    const colorPreference = document.getElementById('color_preference').value;

    const data = {
        logo_name: logoName,
        color_preference: colorPreference
    };

    try {
        await apiRequest(`/api/leads/step-3/${leadId}`, 'POST', data);
        window.location.href = 'additional-details.php';
    } catch (error) {
        // Error handled
    }
}

/**
 * Step 4: Additional Details
 */
async function submitStep4() {
    const leadId = getLeadId();
    if (!leadId) {
        alert('Session expired. Please start over.');
        window.location.href = 'index.php';
        return;
    }

    const industryInput = document.getElementById('business_industry');
    const commentsInput = document.getElementById('additional_comments');

    const industry = industryInput ? industryInput.value : '';
    const comments = commentsInput ? commentsInput.value : '';

    const data = {
        business_industry: industry,
        additional_comments: comments
    };

    try {
        await apiRequest(`/api/leads/step-4/${leadId}`, 'POST', data);

        // Redirect to payment-step.php with details
        const { pkg, amt } = getPackageDetails();
        window.location.href = `payment-step.php?id=${leadId}&pkg=${encodeURIComponent(pkg)}&amt=${amt}`;
    } catch (error) {
        // Error handled in apiRequest
    }
}

/**
 * Step 5: Package Selection (CRM Sync)
 */
async function submitStep5(leadIdOverride, pkgOverride) {
    const leadId = leadIdOverride || getLeadId();
    if (!leadId) return;

    const { pkg: storedPkg } = getPackageDetails();
    const pkg = pkgOverride || storedPkg;

    // Ensuring the package name follows the requested format (e.g., "Premium Logo Package")
    const packageName = pkg.toLowerCase().includes('package') ? pkg : `${pkg} Package`;

    const data = {
        package_name: packageName
    };

    try {
        return await apiRequest(`/api/leads/step-5/${leadId}`, 'POST', data);
    } catch (error) {
        console.error('Step 5 Sync Failed:', error);
        // We return null but allow the flow to continue to the payment page
        return null;
    }
}

// Utility to handle style card selection (Single Select)
document.addEventListener('DOMContentLoaded', () => {
    // Logo Style Page Interactions
    const styleCards = document.querySelectorAll('.style-card');
    styleCards.forEach(card => {
        card.addEventListener('click', (e) => {
            const radio = card.querySelector('input[type="radio"]');
            if (!radio) return;

            // Clear active-style from all cards
            styleCards.forEach(c => c.classList.remove('active-style'));

            // The click on the card (label) will naturally check the radio.
            // We just need to sync the active class.
            setTimeout(() => {
                if (radio.checked) {
                    card.classList.add('active-style');
                }
            }, 0);
        });
    });
});
