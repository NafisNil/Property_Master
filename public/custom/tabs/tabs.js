$('.tab-link').click(function () {

    let index = $(this).index();

    $(this).addClass('active').siblings().removeClass('active');

    let tabComponent = $(this).closest('.tab-component');

    let contentToBeActive = $(tabComponent).find('.content-wrapper')
        .children('.tab-content').eq(index);

    $(contentToBeActive).addClass('active').siblings().removeClass('active');
});
