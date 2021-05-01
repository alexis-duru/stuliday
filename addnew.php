<?php require 'inc/header.php' ?>

    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>ADD NEW</h2>
            </div>
        </div>
    </section>
    
    <section id="section-addnew">
        <div id="section-addnew-container">
            <div id="container-addnew-item">
                <form action="admin-create-post/php" method="post" runat='server'>
                    <h3>DETAILS OF YOUR RENTAL</h3>
                    <input type="text" name="name" value="" placeholder="Name of your rental">
                    <h3>PHOTO OF YOUR RENTAL</h3>
                    <input type="file" id=''>
                    <h3>DESCRIBE YOUR RENTAL</h3>
                    <textarea rows="5" id="description" value="" placeholder="Describe your rental"
                        name="description"></textarea>
                    <h3>LOCATION</h3>
                    <select>
                        <label for="country-select">Choose your country</label>
                        <option value="">--Please choose a country--</option>
                        <option value="dog">France</option>
                        <option value="cat">Poland</option>
                        <option value="hamster">Serbia</option>
                        <option value="parrot">Luxembourg</option>
                        <option value="spider">Portugal</option>
                    </select>
                    <input type="text" name="name" value="" placeholder="Name of your city">
                    <input type="text" name="name" value="" placeholder="Postal code">
                    <div id="date-select">
                        <h3>DATE OF</h3>
                        <input type="date" id="start" name="trip-start" value="2021-05-01" placeholder="availabilities">
                        <h3>TO</h3>
                        <input type="date" id="end" name="trip-end" value="2021-05-01" placeholder="availabilities">
                    </div>
                    <h3>SQUARE METER</h3>
                    <input type="number" id="square-meter" name="square-meter" placeholder="square meter">
                </form>
                <div>
                    <a class="btn-create" href="#">CREATE</a>
                    <a class="btn-return" href="#">RETURN</a>
                </div>

            </div>
        </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
    