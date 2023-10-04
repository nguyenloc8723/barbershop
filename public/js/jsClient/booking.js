$(document).ready(function () {
    function loadStylist() {
        $.ajax({
            url: '/api/stylist/booking',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                data.map(item => {
                    $('.jqr-show-stylist').append(`
                    <div class="swiper-slide item isActive swiper-slide-active jqr-detail"
                      role="presentation" style="width: 78px;" data-id="${item.id}">
                        <div class="content-center-middle "><div class="relative">
                                <img class="" src="img/team/1.jpg" alt="Icon">
                                <br>
                                <div>
                                    <span class="name-stylist">${item.name}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
                });
            },
            error: function (error) {
                console.error(error);
            }
        })
    }
    loadStylist();

   $(document).on('click', '.jqr-detail',function () {
       let idStylist = $(this).data('id')
       timeSheet(idStylist);
   })

    function timeSheet(id) {
        $.ajax({
            url: '/api/timeSheet/booking/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let dataStylist = data.dataStylist;
                let dataTimeSheet = data.dataTimeSheet;
                console.log(dataStylist);
                console.log(dataTimeSheet);
                $('.jqr-timesheet').html('');
                let count = 0;

                if (dataTimeSheet.length % 3 === 0){
                    count = dataTimeSheet.length / 3;
                }else {
                    count = Math.floor(dataTimeSheet.length / 3) + 1;
                }

                let timesheet_box = ``;
                for (let i = 0; i < count; i++) {
                    timesheet_box += `<div class="swiper-slide box-time_gr" style="width: 101.048px; margin-right: 8px;">`;
                    for (let j = 0; j < 3; j++) {
                        let index = i * 3 + j;
                        if (index < dataTimeSheet.length) {
                            let unavailable = "unavailable";
                            for (let k = 0; k < dataStylist.time_sheet.length; k++) {
                                if (dataStylist.time_sheet[k].id === dataTimeSheet[index].id) {
                                    unavailable = "";
                                    break;
                                }
                                console.log(index);
                            }
                            timesheet_box += `<div class="box-time_item ${unavailable}" role="presentation">${dataTimeSheet[index].hour}h${dataTimeSheet[index].minutes}</div>`;

                        }
                    }
                    timesheet_box += `</div>`;
                }
                $('.jqr-timesheet').append(timesheet_box);

            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
