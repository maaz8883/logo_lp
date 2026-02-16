<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo Details - Pixel Brand Design</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="logo">
                         <img src="./assets/images/header-footer/black-logo.png" alt="">

        </div>
        <div class="header-right">
            <a href="tel:+12792251157" class="phone">(279) 225-1157</a>
            <!-- <a href="#" class="btn-chat">Chat With Us</a> -->
        </div>
    </header>

    <div class="progress-container">
        <div class="progress-line"></div>
        <div class="progress-line-fill" style="width: 50%;"></div>
        <div class="progress-steps">
            <div class="step completed"></div> <!-- Step 1 Done -->
            <div class="step completed"></div>
            <!-- Step 2 Active/Done? In SS uploaded_image_1, first TWO are checked. -->
            <div class="step"></div>
            <!-- <div class="step"></div> -->
        </div>
    </div>

    <div class="container">
        <h1 class="page-title">Please Fill Your Design Brief</h1>
        <p class="subtitle">Fill out the brief form so the designers understand the perfect logo you're looking for.</p>

        <div class="card">
            <form>
                <div class="form-group">
                    <label class="form-label">Exact name you want in your logo</label>
                    <input type="text" id="logo_name" class="form-control" placeholder="Mobile EV Charge and Go">
                </div>

                <div class="form-group">
                    <label class="form-label">What is your color preference?</label>
                    <input type="text" id="color_preference" class="form-control"
                        placeholder="Light Grays, yellow, Miami blue">
                </div>
            </form>
        </div>

        <div class="footer-actions">
            <a href="#" class="btn-next" onclick="event.preventDefault(); submitStep3();">Save & Continue</a>
        </div>
    </div>
    <script src="api.js"></script>
</body>

</html>