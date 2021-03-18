// Добавление в корзину
let addButtons = document.querySelectorAll('.buy-btn');
addButtons.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('/cart/add', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                console.log(answer);
                document.getElementById('cartCount').innerText = answer.cartCount;
            }
        )();
    })
});

let removeButtons = document.querySelectorAll('.remove-btn');
removeButtons.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('/cart/delete', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                document.getElementById(id).remove();
                document.getElementById('cartCount').innerText = answer.cartCount;
                let cartCount = answer.cartCount;
                if (answer.cartCount == 0) {
                    let statusCart = document.createElement('p');
                    statusCart.id = "statusCart";
                    statusCart.innerText = "Корзина пуста";
                    document.getElementById('title').after(statusCart);
                }
            }
        )();
    })
});

let orderButton = document.querySelectorAll('#create-order');
orderButton.forEach((elem) => {
    elem.addEventListener('click', () => {
        let name = document.getElementById('order-name').value;
        let phone = document.getElementById('order-phone').value;
        if (name === '' || phone === '') {
            alert('Заполните все поля');
            return false;
        }
        (
            async () => {
                const response = await fetch('/cart/order', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        name: name,
                        phone: phone
                    })
                });
                const answer = await response.json();
                document.getElementById('cart-products').remove();
                document.getElementById('order-form').remove();
                document.getElementById('cartCount').innerText = answer.cartCount;
                let cartCount = answer.cartCount;
                if (answer.cartCount == 0) {
                    let statusCart = document.createElement('p');
                    statusCart.id = "statusCart";
                    statusCart.innerText = "Корзина пуста";
                    document.getElementById('title').after(statusCart);
                }
                return alert('Заказ оформлен');
            }
        )();
    });
});


let statusButton = document.querySelector('#order-status-btn');
if (statusButton !== null) {
    statusButton.addEventListener('click', () => {
        let id = document.getElementById('order-id').innerText;
        let status = document.getElementById('order-status-select').value;
        (
            async () => {
                const response = await fetch('/orders/changeOrderStatus', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'},
                    body: JSON.stringify({
                        id: id,
                        status: status
                    })
                });
                const answer = await response.json();

                document.getElementById('order-status').innerText = answer.textStatus;
                 alert('Статус изменен');
            }
        )();
    })
}
