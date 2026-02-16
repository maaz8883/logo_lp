<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Logo Style - Pixel Brand Design</title>
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
        <div class="progress-line-fill" style="width: 30%;"></div>
        <div class="progress-steps">
            <div class="step completed"></div>
            <div class="step "></div>
            <!-- Assuming this is step 2 visually based on some flows, but usually Style is Step 1. Wait, let's check SS. SS 3 shows 2nd tick active? Let's assume Style is Step 1 for logic, but match SS visually if possible. Actually SS of Logo Style shows 1st tick active. -->
            <div class="step"></div>
            <!-- <div class="step"></div> -->
        </div>
    </div>
    <!-- Correction: The Logo Style screenshot shows the FIRST tick as checked, and others empty. 
         Wait, let's look at uploaded_image_2_...png (Logo Styles). It has a checkmark on the first circle? 
         No, it has a checkmark on the first circle. So we are on Step 1.
    -->
    <style>
        .progress-line-fill {
            width: 15%;
        }

        .step:nth-child(1) {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .step:nth-child(1)::after {
            content: '✓';
        }

        /* Actually if it's the current step it might just be active. But SS shows checkmark. Let's make Step 1 checked/active. */
    </style>

    <div class="container">
        <h1 class="page-title">Please Fill Your Design Brief</h1>
        <p class="subtitle">Fill out the brief form so the designers understand the perfect logo you're looking for.</p>

        <div class="card">
            <form action="logo-details.html">
                <div class="grid-container">
                    <!-- 1. Wordmark -->
                    <label class="style-card">
                        <div class="style-image">DISCOUNT</div>
                        <div class="style-title">Wordmark</div>
                        <div class="style-desc">Unique typographic treatments help them remember your name.</div>
                        <input type="checkbox" class="style-checkbox">
                    </label>

                    <!-- 2. Emblem -->
                    <label class="style-card">
                        <div class="style-image" style="background: #222;">EMBLEM</div>
                        <div class="style-title">Emblem</div>
                        <div class="style-desc">Build a legacy with a badge, seal or crest.</div>
                        <input type="checkbox" class="style-checkbox">
                    </label>

                    <!-- 3. Abstract -->
                    <label class="style-card">
                        <div class="style-image" style="background: #101030;">ABSTRACT</div>
                        <div class="style-title">Abstract</div>
                        <div class="style-desc">Truly custom abstract images stand for you and you alone.</div>
                        <input type="checkbox" class="style-checkbox">
                    </label>

                    <!-- 4. Mascot -->
                    <label class="style-card">
                        <div class="style-image" style="background: #8b3a3a;">MASCOT</div>
                        <div class="style-title">Mascot</div>
                        <div class="style-desc">Fun brands start with a memorable character.</div>
                        <input type="checkbox" class="style-checkbox">
                    </label>

                    <!-- 5. Pictorial -->
                    <label class="style-card">
                        <div class="style-image" style="background: #f4f4f4; color: #333;">PICTORIAL</div>
                        <div class="style-title">Pictorial</div>
                        <div class="style-desc">Link your business with the image of your choice: instant brand
                            personality.</div>
                        <input type="checkbox" class="style-checkbox">
                    </label>

                    <!-- 6. Combination -->
                    <label class="style-card">
                        <div class="style-image">COMBINATION</div>
                        <div class="style-title">Combination</div>
                        <div class="style-desc">Words and images mixed together to create the perfect combo.</div>
                        <input type="checkbox" class="style-checkbox">
                    </label>
                </div>
            </form>
        </div>

        <div class="footer-actions">
            <a href="logo-details.html" class="btn-next">Save & Continue</a>
        </div>
    </div>
        <script src="api.js"></script>
        <script>
            // Override the Next button to call our API function
            document.querySelector('.btn-next').addEventListener('click', (e) => {
                e.preventDefault();
                submitStep2();
            });

            // Add values to checkboxes for easier JS access
            const types = ['Wordmark', 'Emblem', 'Abstract', 'Mascot', 'Pictorial', 'Combination'];
            const cards = document.querySelectorAll('.style-card');
            cards.forEach((card, index) => {
                const input = card.querySelector('input');
                input.setAttribute('name', 'logo_style'); // Group them
                input.value = types[index]; // Set value matches API expected enum
                // Prevent default label click to handle it purely in JS if needed or let default behavior work
            });
        </script>
</body>

</html>