<?php session_start(); ?>

<body>
    <div class="info-box center">
        <div class="info-form aligned">
            <button class="close-button" onclick="closePopup()">x</button>
            <h2>Plans</h2>
            <article>
                <div class="plan">
                    <div class="div-plan">
                        <h3>Free Plan (current)</h3>
                    </div>
                    <ul class="text-plan">
                        <h4>Features</h4>
                        <li>· Interactive map and nearby deals.</li>
                        <li>· Real-time deal notifications.</li>
                        <li>· Personalized wishlist.</li>
                        <li>· Access to limited-time offers.</li>
                        <li>· Basic customer support.</li>
                    </ul>
                </div>
                <div class="plan">
                    <div class="div-plan">
                        <h3>Premium Plan</h3>
                        <a href="#"><button id="upgrade-button">Upgrade plan</button></a>
                    </div>
                    <ul class="text-plan">
                        <h4>Features</h4>
                        <li>· Priority access to best deals.</li>
                        <li>· Exclusive additional discounts.</li>
                        <li>· Priority and personalized support.</li>
                        <li>· Advanced customization.</li>
                        <li>· Enhanced interactive map.</li>
                    </ul>
                </div>
            </article>
        </div>
    </div>
</body>
