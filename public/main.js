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