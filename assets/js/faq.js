document.addEventListener('DOMContentLoaded', function () {
    var accordion = document.querySelector('.faq__accordion');
    if (!accordion) return;

    var items = Array.prototype.slice.call(accordion.querySelectorAll('.faq__item'));
    if (!items.length) return;

    items.forEach(function (item) {
        var question = item.querySelector('.faq__question');
        var answer = item.querySelector('.faq__answer');
        if (!question || !answer) return;

        question.addEventListener('click', function () {
            var isActive = item.classList.contains('faq__item--active');
            var isExpanded = question.getAttribute('aria-expanded') === 'true';

            // Закрываем все элементы
            items.forEach(function (otherItem) {
                var otherQuestion = otherItem.querySelector('.faq__question');
                var otherAnswer = otherItem.querySelector('.faq__answer');
                if (!otherQuestion || !otherAnswer) return;

                otherItem.classList.remove('faq__item--active');
                otherQuestion.setAttribute('aria-expanded', 'false');
                otherAnswer.style.maxHeight = null;
            });

            // Если элемент был закрыт, открываем его
            if (!isExpanded) {
                item.classList.add('faq__item--active');
                question.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    // Инициализация: открываем активный элемент при загрузке
    var activeItem = accordion.querySelector('.faq__item--active');
    if (activeItem) {
        var activeQuestion = activeItem.querySelector('.faq__question');
        var activeAnswer = activeItem.querySelector('.faq__answer');
        if (activeQuestion && activeAnswer) {
            activeQuestion.setAttribute('aria-expanded', 'true');
            activeAnswer.style.maxHeight = activeAnswer.scrollHeight + 'px';
        }
    }
});



