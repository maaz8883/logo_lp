<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Details - Pixel Brand Design</title>
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
        <div class="progress-line-fill" style="width: 75%;"></div>
        <div class="progress-steps">
            <div class="step completed"></div>
            <div class="step completed"></div>
            <div class="step "></div> <!-- In SS uploaded_image_0, first THREE are checked. -->
            <!-- <div class="step"></div> -->
        </div>
    </div>

    <div class="container">
        <h1 class="page-title">Please Fill Your Design Brief</h1>
        <p class="subtitle">Fill out the brief form so the designers understand the perfect logo you're looking for.</p>

        <div class="card">
            <form>
                <div class="form-group">
                    <label class="form-label">Please specify your business industry</label>
                    <input type="text" id="business_industry" class="form-control"
                        placeholder="e.g. realtor, law firm, healthcare">
                </div>

                <div class="form-group">
                    <label class="form-label">Any additional comments</label>
                    <textarea id="additional_comments" class="form-control"
                        placeholder="e.g. Is there anything else you'd like to communicate to the designers?"></textarea>
                </div>
            </form>
        </div>

        <div class="footer-actions">
            <!-- No next link provided in instructions, but assuming a submit or finish. Keeping it generic or pointing to # -->
            <a href="#" class="btn-next" onclick="event.preventDefault(); submitStep4();">Save & Continue</a>
        </div>
    </div>
    <script src="api.js"></script>
</body>

</html>