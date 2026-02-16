const API_BASE_URL = 'https://elementdesignagency.com/crm';

/**
 * Helper to get value from localStorage
 */
function getLeadId() {
    return localStorage.getItem('lead_id');
}

/**
 * Helper to set value to localStorage
 */
function setLeadId(id) {
    localStorage.setItem('lead_id', id);
}

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
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.message || `API Error: ${response.status}`);
        }

        return await response.json();
    } catch (error) {
        console.error('API Request Failed:', error);
        alert('Something went wrong. Please try again.');
        throw error;
    }
}

/**
 * Step 1: Initial Contact
 */
async function submitStep1(e) {
    e.preventDefault();
    
    // alert(4);

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;
    const brand_id = 2;

    if (!name || !email || !phone) {
        alert('Please fill in all required fields.');
        return;
    }

    const data = {
        name,
        email,
        phone,
        message,
        brand_id
    };

    try {
        console.log("Before API call");

        const result = await apiRequest('/api/leads/step-1', 'POST', data);
        console.log("After API call", result);

        if (result.lead_id) {
            setLeadId(result.lead_id);
            window.location.href = 'logo-style.php';
        } else {
            alert('Failed to get lead ID from server.');
        } 
    } catch (error) {
        // Error already handled in apiRequest
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

    const selectedStyleInput = document.querySelector('input[name="logo_style"]:checked');
    if (!selectedStyleInput) {
        alert('Please select a logo style.');
        return;
    }

    // Determine the value based on the checkbox/radio logic
    const selectedCheckboxes = document.querySelectorAll('input[name="logo_style"]:checked');
    if (selectedCheckboxes.length === 0) {
        alert('Please select at least one logo style.');
        return;
    }

    // Join multiple values with a comma
    const logoType = Array.from(selectedCheckboxes).map(cb => cb.value).join(', ');

    const data = {
        logo_type: logoType
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

    const industry = document.getElementById('business_industry').value;
    const comments = document.getElementById('additional_comments').value;

    const data = {
        business_industry: industry,
        additional_comments: comments
    };

    try {
        await apiRequest(`/api/leads/step-4/${leadId}`, 'POST', data);
        alert('Thank you! Your design brief has been submitted successfully.');
        // Optional: Redirect to a thank you page or home.
        window.location.href = 'index.php';
    } catch (error) {
        // Error handled
    }
}

// Utility to handle style card selection (Visual only)
document.addEventListener('DOMContentLoaded', () => {
    // Logo Style Page Interactions
    const styleCards = document.querySelectorAll('.style-card');
    styleCards.forEach(card => {
        card.addEventListener('click', (e) => {
            // Toggle selection instead of single select

            // Check current state from the checkbox inside
            const checkbox = card.querySelector('input');
            if (!checkbox) return; // Guard

            // If the user clicked the card but not the checkbox itself, we toggle.
            // If they clicked the checkbox directly, it toggles automatically, but we need to update visual class.

            // Note: The event listener is on the LABEL (style-card), so clicking it toggles the checkbox input inside by default browser behavior.
            // We just need to sync the active-style class.

            // We adding a small delay or checking state after event loop to ensure valid checked state
            setTimeout(() => {
                if (checkbox.checked) {
                    card.classList.add('active-style');
                } else {
                    card.classList.remove('active-style');
                }
            }, 0);
        });
    });
});
