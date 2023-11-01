<main>
    <section>
        <h1>Address List</h1>
        <a href="#" class="a-button" id="showAddressForm">New Address</a>
        <table border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Street</th>
                    <th>ZIP Code</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addresses as $address) : ?>
                    <tr>
                        <td><img class="edit-address" src="assets/img/edit.svg" alt="Edit" data-id="<?php echo $address['id']; ?>"></td>
                        <td><?php echo $address['first_name']; ?></td>
                        <td><?php echo $address['last_name']; ?></td>
                        <td><?php echo $address['email']; ?></td>
                        <td><?php echo $address['street']; ?></td>
                        <td><?php echo $address['zip_code']; ?></td>
                        <td><?php
                            foreach ($cities as $city) {
                                if ($city['id'] == $address['city_id']) {
                                    echo $city['city_name'];
                                    break;
                                }
                            }
                            ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

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

                    <div class="form-group">
                        <label for="group_id" class="form-label">Group:</label>
                        <select name="group" id="group" class="form-input">
                            <option value="">Select Group</option>
                            <?php foreach($groups as $group) : ?>
                                <?php if($group['parent_id'] == 0) : ?>
                                    <option value="<?php echo $group['id']; ?>"><?php echo $group['group_name']; ?></option>
                                    <?php printChildGroups($groups, $group['id'], 1);
                                    ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>

                        <?php
                        function printChildGroups($data, $parent_id, $indentLevel)
                        {
                            foreach($data as $group) {
                                if($group['parent_id'] == $parent_id) {
                                    echo '<option value="' . $group['id'] . '">';
                                    for($i = 0; $i < $indentLevel; $i++) {
                                        echo '--';
                                    }
                                    echo $group['group_name'] . '</option>';
                                    printChildGroups($data, $group['id'], $indentLevel + 1);
                                }
                            }
                        }
                    ?>
                    </div>

                    <div class="form-group form-actions">
                        <input type="submit" value="Save Address" class="form-button">
                    </div>

                </form>
            </div>
        </div>
    </div>

</main>