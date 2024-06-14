function AddAmount() {
    var amount = document.getElementById("amount_donation").innerHTML;
    return String(amount);
}

paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
        sandbox: 'ARh22r2C2CoTfPGLhni85KemTpwITeoIPNSTnSpvL_lIfMgNtCz_LHRdjnIBxrmxeYa_1madAU7euKYB',
        // production: 'LIVE_CLIENT_ID' //Enter your live client ID here
    },
    // Customize button (optional)
    locale: 'es_ES',
    style: {
        size: 'large',
        color: 'gold',
        label: 'pay'
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,
    // Set up a payment
    payment: function(data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: AddAmount(),
                    currency: 'EUR'
                }
            }]
        });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            // Show a confirmation message to the buyer
            // addDonation(data.billingID);
            console.log(data);
            window.location = 'index.php?route=payment&order-id=' + data.orderID;
        });
    },
    onCancel: function(data) {
        alert("El pago ha sido cancelado.");
        // console.log(data.billingID);
    },
}, "#paypal-button-container");