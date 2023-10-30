<main>
    <section>
        <h1>Groups</h1>
        <a href="#" class="a-button" id="showGroupForm">New Group</a>
        <?php foreach ($groups as $group) : ?>
            <div class="group"><a href="#" data-id="<?php echo $group['id'] ?>" class="group-item"><?php echo $group['group_name']; ?></a></div>
        <?php endforeach; ?>        
    </section>


    <div id="addressModal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="closeModal">&times;</span>

            <h3>Address</h3>

            <div class="form-wrapper">
                <form id="addAddressForm" class="form-container">
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" name="first_name" id="first_name" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="street" class="form-label">Street:</label>
                        <input type="text" name="street" id="street" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="zip_code" class="form-label">ZIP Code:</label>
                        <input type="text" name="zip_code" id="zip_code" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="city_id" class="form-label">City:</label>
                        <select name="city_id" id="city_id" class="form-input">
                            <?php foreach ($cities as $city) : ?>
                                <option value="<?php echo $city['id']; ?>"><?php echo $city['city_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group form-actions">
                        <input type="submit" value="Save Address" class="form-button">
                    </div>

                </form>
            </div>
        </div>
    </div>

</main>