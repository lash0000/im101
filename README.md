# im101
update as of 02/05/24
- habolan naaa T_T

## Starting Command PHP idk?
```bash
composer install
```

```bash
https://www.figma.com/file/8X2DBJQCi4kXQuTagEexW0/IMIPT---Prototype?type=design&node-id=526%3A435&mode=design&t=447BvfqFvtIB9Sm1-1
```

    <main class="main-content">
        <form action="" class="main-wrapper" method="post">
            <div class="cart-checkout-progress">
                <div class="cart-mode">
                    <div class="cart-logo session-active"></div>
                    <label>Carts</label>
                </div>
                <a class="cart-mode" href="./shipment.php">
                    <div class="cart-logo session-active"></div>
                    <label>Shipment</label>
                </a>
                <div class="cart-mode">
                    <div class="cart-logo session-active"></div>
                    <label>Place Order</label>
                </div>
            </div>
            <div class="cart-catalog">
                <div class="form-group-cart">
                    <div class="cart-input">
                        <label>First Name</label>
                        <input type="text" id="first-name" class="char-field" value="" disabled />
                    </div>
                    <div class="cart-input">
                        <label>Last Name</label>
                        <input type="text" id="last-name" class="char-field" value="" disabled />
                    </div>
                    <div class="cart-input">
                        <label>Full Address</label>
                        <input type="text" id="recipent-address" class="char-field" value="" disabled />
                    </div>
                    <div class="cart-input">
                        <label>Contact Number (PH)</label>
                        <div class="cart-input-absolute">
                            <span class="country-code">
                                (+63)
                            </span>
                            <input type="tel" id="contact-number" class="contact-field" value="" disabled />
                        </div>
                    </div>
                    <div class="cart-input">
                        <label>Reference Tracking Number</label>
                        <input type="number" id="reference-track" class="ref-number-field" value="" disabled />
                    </div>
                    <div class="cart-input">
                        <label>Order ID Number</label>
                        <input type="number" id="order-number" class="ref-number-field" value="" disabled />
                    </div>
                    <div class="cart-input">
                        <label>Payment Method</label>
                        <input type="text" id="payment-method" class="ref-number-field" value="COD" disabled />
                    </div>
                    <div class="cart-input">
                        <label for="payment-date">Date Ordered</label>
                        <input type="date" id="payment-date" class="ref-number-field" value="<?php echo date('Y-m-d'); ?>" disabled />
                    </div>
                    <div class="cart-input-checkbox">
                        <div class="checkmate">
                            <input type="checkbox" id="affirmation-checkbox" required />
                        </div>
                        <label for="affirmation-checkbox">We are committed to protecting your privacy. Your information will be used only in accordance with our Privacy Policy, which adheres to the Cybercrime Prevention Act of 2012.</label>
                    </div>
                </div>
            </div>
            <div class="cart-total-amount" id="cart-total-amount">
                <span>This is the partial pre-ordered..</span>
            </div>
            <div class="cart-checkout">
                <button class="cart-proceed" type="submit">
                    Proceed
                </button>
            </div>
        </form>
    </main>

    <!-- confirmation modal -->
    <div class="modal-container" style="display: none; opacity: 0;">
        <div class="modal-wrapper">
            <header class="header-modal">
                <span>Place Order Confirm?</span>
                <button class="material-symbols-outlined" id="close-modal">
                    close
                </button>
            </header>
            <main class="header-body">
                <label id="modal-label">This action is irreversible.</label>
            </main>
            <footer class="header-options">
                <button id="confirm-modal-button" class="proceed-active" type="submit">Proceed</button>
                <button id="close-modal">Cancel</button>
            </footer>
        </div>
    </div>

In PlaceOrder.php when the user finally do form submission again we should use the saves localStorages on JavaScript with the following items of shipmentForm and cartFormData 

I supposed that every localStorage items is being JSON written 

so for cartFormData I will remind you that the trv_item_boxes, trv_item_name, trv_item_qty, trv_total_amount saved attribute should be used to initialize for adding / INSERTING in the treiven_orders TABLE

LocalStorageName | Actual SQL Column Name

trv_item_name | trv_item_name
trv_item_qty | trv_item_qty

