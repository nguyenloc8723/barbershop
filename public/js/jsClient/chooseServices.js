$(document).ready(function () {
    // let csrfToken = $('meta[name="csrf-token"]').attr('content');
    // const showService = '/api/service/booking';
    // const takeService = '/api/takeService/booking';
    // const sendApiService = $('.jqr-clickService');
    // function loadAll() {
    //     $.ajax({
    //         url: showService,
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function (response) {
    //             let data = response.data;
    //             let imgService = response.service;
    //             // console.log(imgService)
    //             // console.log(response);
    //             let category = '';
    //             let countImg = 0;
    //             for (let i = 0; i < data.length; i++) {
    //                 let count = data[i].service.length;
    //                 let service = '';
    //                 service += `
    //                 <div class="service">
    //                      <div class="service__category">
    //                          <div class="category__name">${data[i].name}</div>
    //                          <div class="category__number">${count} dịch vụ</div>
    //                      </div>
    //                             <div class="service__list">
    //                                  <div class="grid gap-4 grid-cols-2 flex-column">
    //                       `
    //                 for (let j = 0; j < count; j++) {
    //                     service += `
    //                             <div class="list__item">
    //                                 <div class="item__media " role="presentation">
    //                                    <img src="/storage/${imgService[countImg].images[0].url}" alt>
    //                                 </div>
    //                                 <div class="item__title " role="presentation">${data[i].service[j].name}</div>
    //                                 <div class="item__description " role="presentation">
    //                                     ${data[i].service[j].description}
    //                                 </div>
    //                                 <div class="item__price " role="presentation">
    //                                     <div class="meta__price">
    //                                         <span class="meta__newPrice">${data[i].service[j].price}</span>
    //                                         <span class="meta__oldPrice"></span>
    //                                     </div>
    //                                 </div>
    //                                 <div class="item__button jqr-css" data-id="${data[i].service[j].id}" role="presentation">
    //                                 Chọn
    //                                 </div>
    //                             </div>
    //                                `
    //                     countImg++
    //                 }
    //                 category += service;
    //                 category += `</div></div></div>
    //                 <hr>
    //             `;
    //             }
    //             $('#jqr-category').append(category);
    //         },
    //         error: function (error) {
    //             console.error(error);
    //         }
    //     });
    // }
    // loadAll();
    //
    //
    // let selectIDs = [];
    // let countSelect = 0;
    // $(document).on('click', '.item__button', function () {
    //     let id = $(this).data('id');
    //     $(this).css({
    //         'background-color': '#91765a',
    //         'border': '1px solid #91765a',
    //         'color': '#fff',
    //     });
    //
    //     if (!selectIDs.includes(id)){
    //         selectIDs.push(id);
    //     }else {
    //         let index = selectIDs.indexOf(id);
    //         if (index !== -1){
    //             selectIDs.splice(index, 1);
    //         }
    //         $(this).css({
    //             'background-color': '#fff',
    //             'border': '1px solid #91765a',
    //             'color': '#000',
    //         });
    //     }

        // countSelect = selectIDs.length;
        // if (countSelect === 0){
        //     $('.jqr-clickService').css({
        //         'background-color': '#fff',
        //         'border': '1px solid #91765a',
        //         'color': '#000',
        //     });
        //     $('.jqr-clickService').html(`<span>Chọn dịch vụ</span>`);
        // }else {
        //     $('.jqr-clickService').css({
        //         'background-color': '#91765a',
        //         'border': '1px solid #91765a',
        //         'color': '#fff',
        //     });
        //     $('.jqr-clickService').html(`<span>Chọn ${countSelect} dịch vụ</span>`);
        // }

        // let value = selectIDs;
        // console.log(selectIDs);
    // })

    // function select(arrayId) {
    //     $.ajax({
    //         url: takeService,
    //         method: 'POST',
    //         data: {'arrayID' : arrayId},
    //         headers: {
    //             'X-CSRF-TOKEN': csrfToken,
    //         },
    //         success: function (data) {
    //             console.log(data);
    //             window.location.href = "/client/booking";
    //         },
    //         error: function (error) {
    //             console.error(error);
    //         }
    //     });
    // }
    // sendApiService.on('click', function () {
    //     select(selectIDs)
    // });
});
