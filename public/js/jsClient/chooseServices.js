$(document).ready(function () {
    const showService = '/api/service/booking';
    const showTimeSheet = '/api/timeSheet/booking';

    function loadAll() {
        $.ajax({
            url: showService,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let category = '';
                for (let i = 0; i < data.length; i++) {
                    let count = data[i].service.length;
                    let service = '';
                    service += `
                    <div class="service">
                         <div class="service__category">
                             <div class="category__name">${data[i].name}</div>
                             <div class="category__number">${count} dịch vụ</div>
                         </div>
                                <div class="service__list">
                                     <div class="grid gap-4 grid-cols-2 flex-column">
                          `

                    for (let j = 0; j < data[i].service.length; j++) {
                        service += `
                                <div class="list__item">
                                    <div class="item__media " role="presentation">
                                       <img src="https://storage.30shine.com/service/combo_booking/382.jpg" alt>
                                    </div>
                                    <div class="item__title " role="presentation">${data[i].service[j].name}</div>
                                    <div class="item__description " role="presentation">
                                        ${data[i].service[j].description}
                                    </div>
                                    <div class="item__price " role="presentation">
                                        <div class="meta__price">
                                            <span class="meta__newPrice">${data[i].service[j].price}</span>
                                            <span class="meta__oldPrice"></span>
                                        </div>
                                    </div>
                                    <div class="item__button " data-id="${data[i].service[j].id}" role="presentation">
                                    Chọn
                                    </div>
                                </div>
                                   `
                    }
                    category += service;
                    category += `</div></div></div>
                    <hr>
                `;
                }
                $('#jqr-category').append(category);

            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    loadAll();
})
