<?php
$uuid = $_GET['id'] ?? 'N/A';
$pkg = $_GET['pkg'] ?? 'Standard Package';
$status = $_GET['status'] ?? '';

// If not coming from a successful payment, maybe redirect back
if ($status !== 'success' && $uuid === 'N/A') {
    // header('Location: index.php');
    // exit;
}
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>


 @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary-gradient: linear-gradient(135deg, #FFD700 0%, #B8860B 100%);
            --dark-bg: #0a0a0a;
        }

        body {
            background-color: #ffffff;
            color: #fff;
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            overflow-x: hidden;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 0;
        }

        .thank-you-container {
            max-width: 600px;
            width: 90%;
            padding: 30px 30px;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 30px;
            text-align: center;
            position: relative;
            box-shadow: 0 2px 10px 0px rgba(0, 0, 0, 0.5);
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #BE5264 20%, #BE5264 50%, #F8BB16 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 50px;
            color: #000;
            box-shadow: 0 0 30px rgba(184, 134, 11, 0.4);
            animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        h1 {
            font-size: 40px;
            font-weight: 700;
            background: var(--primary-gradient);
            margin-bottom: 15px;
            background-image: linear-gradient(45deg, #BE5264 20%, #BE5264 50%, #F8BB16 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.lead-text {
            color: #000;
            font-size: 16px;
            margin-bottom: 30px;
            font-weight: 400;
        } 

        .order-info {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 35px;
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-bottom: 12px;
        }

        .info-row:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            color: #000;
            font-size: 16px;
            font-weight: 600;
        }

        .info-value {
            color: #b75267;
            font-weight: 600;
            font-size: 15px;
        }

        .btn-home {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(45deg, #BE5264 20%, #BE5264 50%, #F8BB16 100%);
            color: #ffffff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(184, 134, 11, 0.2);
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(184, 134, 11, 0.4);
            color: #000;
        }

        .confetti-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .btn-home:hover {
    background: #000;
    transition: 0.5s;
    color: #fff;
}

.success-icon i {
    font-size: 34px;
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
    <header>
        <div class="logo">
            <a href="https://www.logoelementdesign.com/lp/"><img src="./assets/images/header-footer/black-logo.png" alt=""></a>
        </div>
        <div class="header-right">
            <a href="tel:+12792251157" class="phone">(279) 225-1157</a>
            <!-- <a href="#" class="btn-chat">Chat With Us</a> -->
        </div>
    </header>

    <div class="main-content">
        <div class="thank-you-container">
            <div class="success-icon">
                <i class="fa fa-check"></i>
            </div>
            <h1>Thank You!</h1>
            <p class="lead-text">Thank you for choosing Logo Element Design. Our creative team has been notified and will
                begin working on your project immediately.</p>

            <?php if($uuid != 'N/A'){ ?> 
            <div class="order-info">
                <div class="info-row">
                    <span class="info-label">Order ID:</span>
                    <span class="info-value">#
                        <?php echo substr($uuid, 0, 8); ?>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Package:</span> 
                    <span class="info-value">
                        <?php echo htmlspecialchars($pkg); ?>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status:</span>
                    <span class="info-value">Payment Successful</span>
                </div>
            </div>
            <?php } ?>

            <a href="/lp/" class="btn-home">Back to Homepage</a>

            <!-- <p style="margin-top: 30px; font-size: 13px; color: rgba(255,255,255,0.4);">
            A confirmation email has been sent to your registered address.<br>
            Need help? <a href="javascript:void(Tawk_API.toggle())" style="color: #FFD700; text-decoration: none;">Chat
                with us 24/7</a> -->
            </p>
        </div>
    </div>

   
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"17f77fa8a2c74f038af7c94773febd7d","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"17f77fa8a2c74f038af7c94773febd7d","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"17f77fa8a2c74f038af7c94773febd7d","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>