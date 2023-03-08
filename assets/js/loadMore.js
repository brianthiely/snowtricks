// document.getElementById('see-more').addEventListener('click', function () {
//     let offset = {{ tricks|length }};
//
//     fetch('{{ path('homepage', {offset: offset}) }}')
//         .then(response => response.text())
//         .then(function (html) {
//             let div = document.createElement('div');
//             div.innerHTML = html;
//             let newTricks = div.querySelectorAll('.trick');
//             for (let i = 0; i < newTricks.length; i++) {
//                 document.querySelector('.tricks-container').appendChild(newTricks[i]);
//             }
//         });
// });