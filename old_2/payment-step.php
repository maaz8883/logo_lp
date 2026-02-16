<?php



// Function to get package details based on amount
function getPackageFeatures($amount)
{
    $amount = (float) str_replace(',', '', $amount);

    if ($amount == 35) {
        return [
            'name' => 'BASIC LOGO',
            'features' => [
                '4 Logo Concepts',
                '5 Revisions',
                '1 Dedicated Designer',
                'Free Color Options',
                'Free Grayscale Format',
                '24-48 Hours TAT',
                'File Formats (JPG)',
                '100% Ownership Rights',
                '100% Money-back Guarantee',
                '24/7 Expert Support'
            ]
        ];
    } elseif ($amount == 75) {
        return [
            'name' => 'STANDARD LOGO',
            'features' => [
                '5 Logo Design Concepts',
                '8 Revisions',
                '2 Dedicated Designers',
                'Free Stationery Design (Business Card)',
                'Free Color Options',
                'Free Grayscale Format',
                'Free Icon',
                '24-48 Hours TAT',
                'File Formats: PNG, JPG',
                '100% Ownership Rights',
                '100% Money-Back Guarantee',
                '24/7 Expert Support'
            ]
        ];
    } elseif ($amount == 125) {
        return [
            'name' => 'ADVANCE LOGO',
            'features' => [
                '6 Logo Design Concepts',
                '10 Revisions',
                '3 Dedicated Designers',
                'Free Stationery (Business Card, Letterhead)',
                'Free Icon',
                'Free Email Signature',
                'Social Media Designs (Any 3 Platforms)',
                'Free Color Options & Grayscale',
                '24-48 Hours TAT',
                'File Formats: AI, PSD, EPS, PNG, JPG, PDF',
                '100% Ownership Rights',
                '100% Money-Back Guarantee',
                '24/7 Expert Support'
            ]
        ];
    } elseif ($amount == 175) {
        return [
            'name' => 'PREMIUM LOGO',
            'features' => [
                '8 Custom Logo Design Concepts',
                '6 Award-Winning Designers',
                'Unlimited Revisions',
                'Social Media Banner',
                'Free Icon Design',
                'Free Custom Stationery (Letterhead, Card, Invoice)',
                'Flyer OR Bi-Fold Brochure',
                'Free MS Electronic Letterhead',
                'Email Signature Design',
                '48-72 Hours TAT',
                'File Formats: AI, PSD, EPS, PNG, JPG, PDF',
                '100% Satisfaction Guarantee'
            ]
        ];
    } elseif ($amount == 249) {
        return [
            'name' => 'ENTERPRISE LOGO',
            'features' => [
                'Unlimited Logo Concepts',
                '6 Award-Winning Designers',
                'Unlimited Revisions',
                'Social Media Banner',
                'Free Icon Design',
                'Free Custom Stationery (Letterhead, Card, Invoice)',
                'Bi-Fold or Tri-Fold Brochure',
                'Free MS Electronic Letterhead',
                'Email Signature Design',
                '48-72 Hours TAT',
                'File Formats: AI, PSD, EPS, PNG, JPG, PDF',
                '100% Satisfaction Guarantee'
            ]
        ];
    } elseif ($amount == 229) {
        return [
            'name' => 'CORPORATE LOGO',
            'features' => [
                'Unlimited Custom Logo Concepts',
                '8 Award-Winning Designers',
                'Unlimited Revisions',
                '1 Website Prototype',
                'Free Icon Design',
                'Free Custom Stationery (Letterhead, Card, Invoice)',
                'Z-Fold Flyer',
                'Free MS Electronic Letterhead',
                'Email Signature Design',
                '48-72 Hours TAT',
                'File Formats: AI, PSD, EPS, PNG, JPG, PDF',
                '100% Satisfaction Guarantee'
            ]
        ];
    } elseif ($amount == 149) {
        return [
            'name' => 'BEGINNER WEBSITE',
            'features' => [
                '1 Page Website Design',
                'Unlimited Revisions',
                '3 Stock Photos',
                '1 Banner Design',
                'Contact/Query Form',
                'Complete W3C Certified HTML',
                'Complete Deployment',
                'Dedicated Project Manager',
                '100% Ownership Rights',
                '100% Satisfaction Guarantee'
            ]
        ];
    } elseif ($amount == 299) {
        return [
            'name' => 'BUDGET WEBSITE',
            'features' => [
                '3-Page Custom WordPress Website',
                '1 Design Concept',
                '3 Stock Images',
                'Content Integration',
                'Cross-Browser Compatible',
                'Secure Admin Tools',
                'Website Optimization',
                'Contact Form Integration',
                'Dedicated Account Manager',
                'Mobile Responsive Website',
                'CMS Backend Included',
                'SEO Friendly Website'
            ]
        ];
    } elseif ($amount == 1599) {
        return [
            'name' => 'ENTERPRISE PLUS WEBSITE',
            'features' => [
                'Unlimited Custom WordPress Website',
                '2 Design Concepts',
                '12 Stock Images',
                'WordPress CMS Backend',
                'SEO Friendly Website',
                'Google Analytics Integration',
                'Email Automation Integration',
                'Free CMS Integration',
                'Content Integration',
                'Mobile Responsive Website',
                'Cross-Browser Compatible',
                'Secure Admin Tools',
                'Website Optimization',
                'Contact Form Integration',
                'Dedicated Account Manager'
            ]
        ];
    }
    // Default fallback
    return [
        'name' => 'CUSTOM PACKAGE',
        'features' => [
            'Custom Logo/Web Solutions',
            'Full Ownership Rights',
            '24/7 Support',
            'Money-back Guarantee'
        ]
    ];
}

$uuid = $_GET['id'] ?? '';
$url_pkg = $_GET['pkg'] ?? null;
$url_amt = $_GET['amt'] ?? 35;

$packageData = getPackageFeatures($url_amt);
?>
<!DOCTYPE html>
<html lang="en">
    
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Logo Element Design </title>
    <link rel="stylesheet" href="style.css">
    <style>
        .split-card {
            display: flex;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-top: 30px;
        }

        .payment-side {
            flex: 1.5;
            padding: 40px;
        }

        .package-side {
            flex: 1;
            background: #fdfdfd;
            padding: 40px;
            border-left: 1px solid #f0f0f0;
        }

        .pkg-includes-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .pkg-feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pkg-feature-list li {
            padding-left: 25px;
            position: relative;
            margin-bottom: 12px;
            font-size: 14px;
            color: #555;
        }

        .pkg-feature-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #000;
            font-weight: bold;
        }

        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group-half {
            flex: 1;
        }

        .payment-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-pay {
            background: #ff5e3a;
            /* Match orange primary */
            color: #fff;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 6px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .secure-icons {
            margin-top: 20px;
            opacity: 0.7;
        }

        @media (max-width: 768px) {
            .split-card {
                flex-direction: column;
            }

            .package-side {
                border-left: none;
                border-top: 1px solid #f0f0f0;
            }
        }

        /* Loading Overlay */
        #payment-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(10px);
            z-index: 9999;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'Outfit', sans-serif;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 4px solid rgba(255, 215, 0, 0.1);
            border-left-color: #FFD700;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
            box-shadow: 0 0 20px rgba(184, 134, 11, 0.2);
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loader-text {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #FFD700 0%, #B8860B 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    
<!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window._lc = window._lc || {};
    window.__lc.license = 19454392;
    window.__lc.integration_name = "manual_onboarding";
    window.__lc.product_name = "livechat";
    ;(function(n,t,c){function i(n){return e.h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n._lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/19454392/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->


    
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KW7SCQJP');</script>



<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KW7SCQJP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
</head>

<body>
    <!-- Loading Overlay -->
    <div id="payment-loader">
        <div class="spinner"></div>
        <div class="loader-text">Verifying Payment...</div>
    </div>

    <header>
        <div class="logo">
            <img src="./assets/images/header-footer/black-logo.png" alt="">
        </div>
        <div class="header-right">
            <a href="tel:+12792251157" class="phone">(279) 225-1157</a>
        </div>
    </header>

    <div class="progress-container">
        <div class="progress-line"></div>
        <div class="progress-line-fill" style="width: 87.5%;"></div>
        <div class="progress-steps">
            <div class="step completed"></div>
            <div class="step completed"></div>
            <div class="step completed"></div>
            <div class="step"></div>
        </div>
    </div>

    <div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="split-card">
                <div class="payment-side text-center py-5">
                    <div class="success-icon" style="font-size: 60px; color: #28a745; margin-bottom: 20px;">✓</div>
                    <h2 class="thank-you-title" style="font-weight: 700; margin-bottom: 10px;">Payment Successful!</h2>
                    <p class="thank-you-message" style="color: #666; margin-bottom: 30px;">Thank you for your payment. Your
                        order is being processed.</p>
                    <a href="index.php" class="btn-pay"
                        style="text-decoration: none; display: inline-block; width: auto; padding: 12px 30px;">Back to
                        Home</a>
                </div>
                <div class="package-side">
                    <h3 class="pkg-includes-title">Order Summary:</h3>
                    <h5 class="text-primary mb-3"><?php echo htmlspecialchars($packageData['name']); ?></h5>
                    <ul class="pkg-feature-list">
                        <li>Amount Paid: <strong>$<?php echo number_format($url_amt, 2); ?></strong></li>
                        <li>Lead ID: <strong>#<?php echo htmlspecialchars($uuid); ?></strong></li>
                    </ul>
                </div>
            </div>
        <?php else: ?>
            <h1 class="page-title">Complete Your Payment</h1>

            <div class="split-card">
                <!-- Payment Side -->
                <div class="payment-side">
                    <div class="amount-box mb-4 p-3 border rounded bg-light text-center">
                        <div class="amount-label text-muted small uppercase">Total Amount Due</div>
                        <div class="amount-value h3 font-weight-bold" style="color: var(--primary-color);">
                            $<?php echo number_format($url_amt, 2); ?></div>
                    </div>

                    <div class="mb-4">
                        <p class="text-muted small">Please complete your payment via PayPal to finalize your order. All
                            transactions are secure and encrypted.</p>
                    </div>

                    <div id="paypal-button-container"></div>


                </div>

                <!-- Package Side -->
                <div class="package-side">
                    <h3 class="pkg-includes-title">Your Package includes:</h3>
                    <ul class="pkg-feature-list">
                        <?php foreach ($packageData['features'] as $feature): ?>
                            <li><?php echo htmlspecialchars($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="api.js"></script>
    <!-- PayPal SDK -->
     <script src="https://www.paypal.com/sdk/js?client-id=AWf9KL0KBi4GhT2rzRvazWLiDVxV8e1MwwSG6CrrM9Bh8gvdyfpG2vgcBxCrJQgXY5l3hiH3m774Q_e_&currency=USD"></script> 
    <!--<script src="https://www.paypal.com/sdk/js?client-id=AT00S137GKTlQlbVx9-8CLy2j4jd1bEKNpYE3ycFyFFHPcrXjKMyTJIBMc_CkA20W8PaXPFD6Sty1_HQ&currency=USD"></script> -->
    <script>
        paypal.Buttons({
            style: {
                layout: 'vertical',
                color: 'gold',
                shape: 'rect',
                label: 'paypal'
            },
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $url_amt; ?>'
                        },
                        description: 'Signup Payment for <?php echo htmlspecialchars($packageData['name']); ?>'
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(async function (details) {
                    // Show Loader
                    document.getElementById('payment-loader').style.display = 'flex';

                    // Call Step 5 after successful payment with explicit ID and Package
                    try {
                        await submitStep5('<?php echo $uuid; ?>', '<?php echo $url_pkg; ?>');
                    } catch (e) {
                        console.error('Final sync failed:', e);
                    }
                    window.location.href = "thank-you.php?status=success&id=<?php echo $uuid; ?>&pkg=<?php echo urlencode($url_pkg); ?>";
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>