document.addEventListener('DOMContentLoaded', (event) => {
    console.log("Page fully loaded and parsed");

    // Scale effect for all buttons
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.1)';
        });

        button.addEventListener('mouseout', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // AJAX call for add-to-cart buttons
    document.querySelectorAll('.add-to-cart').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-product-id');
            fetch(`added.php?id=${productId}&showModal=true`)
                .then(response => response.text())
                .then(html => {
                    document.querySelector("#addProductModal .modal-body").innerHTML = html;
                    var modal = new bootstrap.Modal(document.getElementById('addProductModal'));
                    modal.show();
                })
                .catch(error => {
                    console.error('Error loading the page: ', error);
                });
        });
    });
});
