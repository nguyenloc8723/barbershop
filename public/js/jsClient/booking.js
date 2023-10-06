$(document).ready(function () {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    const showBooking = '/api/stylist/booking';
    const showTimeSheet = '/api/timeSheet/booking';
    const showService = '/api/service/booking';
    const pullRequestUrl = '/api/pullRequest/booking';
    const showAllService = $('.jqr-showAllService');
    let stylistID = $('.jqr-detail');


    let btnSendService = $('.jqr-clickService');
    let arrayIDService = [];

    function loadStylist() {
        $.ajax({
            url: showBooking,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                data.map(item => {
                    $('.jqr-show-stylist').append(`
                    <div class="swiper-slide item isActive swiper-slide-active jqr-detail"
                      role="presentation" style="width: 78px;" data-id="${item.id}">
                        <div class="content-center-middle "><div class="relative">
                                <img class="jqr-img" src="img/team/1.jpg" style="border: 3px solid #FFFFFF" alt="Icon">
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
    $(document).on('click', '.jqr-detail', function () {
        let idStylist = $(this).data('id')
        timeSheet(idStylist);
    })

    function timeSheet(id) {
        $.ajax({
            url: showTimeSheet + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let dataStylist = data.dataStylist;
                let dataTimeSheet = data.dataTimeSheet;
                // console.log(dataStylist);
                // console.log(dataTimeSheet);
                $('.jqr-timesheet').html('');
                let count = 0;

                if (dataTimeSheet.length % 3 === 0) {
                    count = dataTimeSheet.length / 3;
                } else {
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
                            }
                            timesheet_box += `<div class="box-time_item ${unavailable}" data-id="${dataTimeSheet[index].id}" role="presentation">${dataTimeSheet[index].hour}h${dataTimeSheet[index].minutes}</div>`;
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

    // function getSession() {
    //    $.ajax({
    //        url: showService,
    //        method: 'GET',
    //        dataType: 'json',
    //        success: function (data) {
    //            console.log(data);
    //        },
    //        error: function (error) {
    //            console.error(error);
    //        }
    //    });
    // }
    // getSession();

    $(document).on('click', '.jqr-showAllService', function () {
        allService();
        loadAllService()
    })

    function allService() {
        $('#jqr-displayBooking').html(`
            <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;">

                        <span class="text-center">Chọn dịch vụ</span>
                        <div class="note-price" style="color: #fff;">1K = 1000đ</div>
                    </div>
                    <div class="body relative " style="background-color: #fff;">
                        <div class="floating-service"> </div>
                        <div class="booking-service">
                            <div class="booking-service__input-wrap">
                                    <span class="ant-input-affix-wrapper ant-input-affix-wrapper-lg booking-service__input">
                                        <span class="ant-input-prefix">
                                            <span role="img" aria-label="search" tabindex="-1" class="anticon anticon-search booking-service__input-icon">
                                                <svg viewBox="64 64 896 896" focusable="false" data-icon="search" width="1em" height="1em" fill="currentColor"aria-hidden="true">
                                                    <path d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0011.6 0l43.6-43.5a8.2 8.2 0 000-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <input placeholder="Tìm kiếm dịch vụ, nhóm dịch vụ" class="ant-input ant-input-lg" type="text" value spellcheck="false" data-ms-editor="true">
                                    </span>
                            </div>
                            <div class="booking-service__group">
                                <div class="booking-service__group-title">Chọn xem nhanh theo nhóm</div>
                                <div class="booking-service__group-wrap">


                                </div>
                            </div>
                            <div class="box-switch flex items-center mt-2.5 bg-white px-4 py-2.5">
                                <div class="text-sm font-medium">Dịch vụ đã chọn: 0 dịch vụ</div>

                            </div>
                            <div id="jqr-category">


                            </div>


                            <div class="new-affix-v2">
                                <div class="flex space-between text-center content-step  time-line--active">
                                    <div class="right button-next pointer btn-inactive jqr-clickService jqr-css" role="presentation">
                                        <span>Chọn dịch vụ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        `);
    }

    function mainBooking(service = []) {
        $.ajax({
            url: showService,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                let nameService = response.service;
                let nameSer = "";
                let money = 0;
                let totalAmount = "";
                for (let i = 0; i < nameService.length; i++) {
                    for (let j = 0; j < service.length; j++) {
                        if (service[j] === nameService[i].id) {
                            nameSer += `<div class="booking-service__group-wrap-item">${nameService[i].name}</div>`;
                            money += +nameService[i].price;
                        }
                    }
                }
                totalAmount += `Tổng số tiền anh cần thanh toán:  <span class="font-normal">${money}</span>`

                $('#jqr-displayBooking').html(`
            <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;"><span class="text-center">Đặt lịch giữ chỗ</span></div>
                    <div class="main-screen">
                        <div class="main-screen__block main-screen__block--done" id="serviceAttributeId">
                            <div class="font-medium text-lg mb-3">1. Chọn dịch vụ</div>
                            <div class="cursor-pointer flex item-center bg-f7f7f7 rounded" style="height: 2.75rem; padding-left: 0.625rem; padding-right: 0.625rem;" aria-hidden="true">
                                <div class="relative mr-2.5 lg:mr-3.5"  style="margin-right: 0.625rem;" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10.0001 12.1209L7.68308 14.4379C8.04548 15.2925 8.09936 16.2466 7.83546 17.1366C7.57157 18.0266 7.00635 18.7971 6.23666 19.316C5.46698 19.835 4.54076 20.0701 3.61675 19.981C2.69274 19.892 1.82847 19.4843 1.17207 18.8279C0.515665 18.1715 0.108001 17.3072 0.0189446 16.3832C-0.0701123 15.4592 0.164983 14.533 0.683938 13.7633C1.20289 12.9936 1.97339 12.4284 2.86339 12.1645C3.75338 11.9006 4.70745 11.9545 5.56208 12.3169L7.88008 9.99988L2.21008 4.33288C2.02428 4.14715 1.87689 3.92663 1.77633 3.68393C1.67577 3.44123 1.62401 3.18109 1.62401 2.91838C1.62401 2.65566 1.67577 2.39552 1.77633 2.15282C1.87689 1.91012 2.02428 1.6896 2.21008 1.50388L2.91808 0.796875L10.0001 7.87988L17.0811 0.797875L17.7891 1.50488C17.9749 1.6906 18.1223 1.91112 18.2228 2.15382C18.3234 2.39652 18.3752 2.65666 18.3752 2.91937C18.3752 3.18209 18.3234 3.44222 18.2228 3.68493C18.1223 3.92763 17.9749 4.14815 17.7891 4.33388L12.1201 9.99988L14.4371 12.3169C15.2917 11.9545 16.2458 11.9006 17.1358 12.1645C18.0258 12.4284 18.7963 12.9936 19.3152 13.7633C19.8342 14.533 20.0693 15.4592 19.9802 16.3832C19.8912 17.3072 19.4835 18.1715 18.8271 18.8279C18.1707 19.4843 17.3064 19.892 16.3824 19.981C15.4584 20.0701 14.5322 19.835 13.7625 19.316C12.9928 18.7971 12.4276 18.0266 12.1637 17.1366C11.8998 16.2466 11.9537 15.2925 12.3161 14.4379L10.0001 12.1199V12.1209ZM4.00008 17.9999C4.53051 17.9999 5.03922 17.7892 5.4143 17.4141C5.78937 17.039 6.00008 16.5303 6.00008 15.9999C6.00008 15.4694 5.78937 14.9607 5.4143 14.5857C5.03922 14.2106 4.53051 13.9999 4.00008 13.9999C3.46965 13.9999 2.96094 14.2106 2.58587 14.5857C2.21079 14.9607 2.00008 15.4694 2.00008 15.9999C2.00008 16.5303 2.21079 17.039 2.58587 17.4141C2.96094 17.7892 3.46965 17.9999 4.00008 17.9999ZM16.0001 17.9999C16.5305 17.9999 17.0392 17.7892 17.4143 17.4141C17.7894 17.039 18.0001 16.5303 18.0001 15.9999C18.0001 15.4694 17.7894 14.9607 17.4143 14.5857C17.0392 14.2106 16.5305 13.9999 16.0001 13.9999C15.4696 13.9999 14.9609 14.2106 14.5859 14.5857C14.2108 14.9607 14.0001 15.4694 14.0001 15.9999C14.0001 16.5303 14.2108 17.039 14.5859 17.4141C14.9609 17.7892 15.4696 17.9999 16.0001 17.9999Z" fill="#3D3D3D"/>
                                    </svg>
                                </div>
                                <button class="pr-0.5 overflow-hidden whitespace-nowrap overflow-ellipsis w-full text-sm color-111111 jqr-showAllService">
                                    Xem tất cả dịch vụ hấp dẫn
                                </button>
                                <div class="ml-auto w-2.5"  style="margin-left: auto;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
                                        <path d="M5.3335 5L0.333496 10L0.333496 0L5.3335 5Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="block__box">
                                <div class="mt-4">
                                    <div class="flex flex-wrap -mx-1.5">
                                       ${nameSer}
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm font-light text-[#11B14B]">
                                ${totalAmount}
                            </div>
                        </div>
                        <div class="main-screen__block main-screen__block--active">
                            <div class="next-item"></div>
                            <div class="block" id="service-time">
                                <div class="font-medium text-lg mb-3">2. Chọn ngày, giờ &amp; stylist</div>
                                <div class="stylist" id="stylist">
                                    <div class="stylist__dropdown flex pointer" role="presentation">
                                        <span class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="19" viewBox="0 0 14 19" fill="none">
                                                <path d="M5.05913 11.9551C5.63496 11.7798 6.16683 12.2506 6.16683 12.8525V15.8335C6.16683 16.2937 6.53992 16.6668 7.00016 16.6668C7.4604 16.6668 7.8335 16.2937 7.8335 15.8335V12.8509C7.8335 12.2495 8.3647 11.7788 8.94013 11.9536C11.3676 12.6907 13.2089 14.7753 13.5928 17.3369C13.6747 17.8831 13.2191 18.3335 12.6668 18.3335H1.33351C0.781221 18.3335 0.325818 17.8833 0.408355 17.3372C0.598829 16.0769 1.14795 14.8901 2.00017 13.9237C2.8225 12.9912 3.88375 12.313 5.05913 11.9551ZM7.00016 10.8335C4.23766 10.8335 2.00016 8.596 2.00016 5.8335C2.00016 3.071 4.23766 0.833496 7.00016 0.833496C9.76266 0.833496 12.0002 3.071 12.0002 5.8335C12.0002 8.596 9.76266 10.8335 7.00016 10.8335Z" fill="#111"/>
                                                </svg>
                                        </span>
                                        <span>Đinh Tuấn Anh</span>
                                        <span class="flex item-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M12.72 15.78C12.5795 15.9207 12.3888 15.9999 12.19 16H11.81C11.6116 15.9977 11.4217 15.9189 11.28 15.78L6.15 10.64C6.10314 10.5936 6.06594 10.5383 6.04056 10.4773C6.01517 10.4164 6.00211 10.351 6.00211 10.285C6.00211 10.219 6.01517 10.1537 6.04056 10.0928C6.06594 10.0318 6.10314 9.97652 6.15 9.93004L6.86 9.22004C6.90563 9.17348 6.96008 9.13649 7.02018 9.11123C7.08028 9.08598 7.14482 9.07297 7.21 9.07297C7.27519 9.07297 7.33973 9.08598 7.39983 9.11123C7.45993 9.13649 7.51438 9.17348 7.56 9.22004L12 13.67L16.44 9.22004C16.4865 9.17318 16.5418 9.13598 16.6027 9.1106C16.6636 9.08521 16.729 9.07214 16.795 9.07214C16.861 9.07214 16.9264 9.08521 16.9873 9.1106C17.0482 9.13598 17.1035 9.17318 17.15 9.22004L17.85 9.93004C17.8969 9.97652 17.9341 10.0318 17.9595 10.0928C17.9848 10.1537 17.9979 10.219 17.9979 10.285C17.9979 10.351 17.9848 10.4164 17.9595 10.4773C17.9341 10.5383 17.8969 10.5936 17.85 10.64L12.72 15.78Z" fill="#767676"/>
                                                </svg>
                                        </span>
                                    </div>
                                    <div class="content fade-in">
                                        <div class="left" role="presentation">
                                            <div>
                                                <div class="user-default relative cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                                        <path d="M12.9998 2.1665C10.8572 2.1665 8.7627 2.80187 6.98116 3.99225C5.19963 5.18263 3.8111 6.87457 2.99115 8.8541C2.1712 10.8336 1.95666 13.0119 2.37467 15.1133C2.79267 17.2148 3.82445 19.1451 5.33952 20.6602C6.85459 22.1752 8.7849 23.207 10.8864 23.625C12.9878 24.043 15.166 23.8285 17.1456 23.0085C19.1251 22.1886 20.817 20.8 22.0074 19.0185C23.1978 17.237 23.8332 15.1425 23.8332 12.9998C23.8332 11.5772 23.553 10.1685 23.0085 8.8541C22.4641 7.53974 21.6661 6.34548 20.6602 5.33951C19.6542 4.33355 18.4599 3.53557 17.1456 2.99114C15.8312 2.44672 14.4225 2.1665 12.9998 2.1665V2.1665ZM12.9998 5.4165C13.6426 5.4165 14.271 5.60711 14.8054 5.96423C15.3399 6.32134 15.7565 6.82892 16.0025 7.42278C16.2484 8.01664 16.3128 8.67011 16.1874 9.30055C16.062 9.93099 15.7525 10.5101 15.2979 10.9646C14.8434 11.4191 14.2643 11.7287 13.6339 11.8541C13.0034 11.9795 12.35 11.9151 11.7561 11.6691C11.1623 11.4231 10.6547 11.0066 10.2976 10.4721C9.94045 9.93765 9.74984 9.30929 9.74984 8.6665C9.74984 7.80455 10.0923 6.9779 10.7017 6.36841C11.3112 5.75891 12.1379 5.4165 12.9998 5.4165V5.4165ZM19.0882 17.5065C18.3827 18.4566 17.4646 19.2284 16.4074 19.7602C15.3502 20.2919 14.1832 20.5689 12.9998 20.5689C11.8164 20.5689 10.6495 20.2919 9.59228 19.7602C8.53509 19.2284 7.61701 18.4566 6.91151 17.5065C6.80464 17.3486 6.74136 17.1652 6.72804 16.975C6.71473 16.7848 6.75185 16.5944 6.83567 16.4232L7.06317 15.9465C7.32583 15.3898 7.74119 14.9191 8.26094 14.5892C8.78068 14.2593 9.38342 14.0838 9.99901 14.0832H16.0007C16.6079 14.084 17.2028 14.2549 17.7179 14.5766C18.233 14.8983 18.6476 15.3578 18.9148 15.9032L19.164 16.4123C19.2499 16.585 19.2881 16.7774 19.2748 16.9697C19.2615 17.1621 19.197 17.3474 19.0882 17.5065Z" fill="#767676"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <span>6XPRO <br> Chọn Hộ Anh</span>
                                            </div>
                                        </div>
                                        <div class="right relative">
                                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal"  style=" overflow: auto">
                                                <div class="swiper-wrapper jqr-show-stylist" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block__box">
                                        <div class="relative" id="datebookId">
                                            <div class="cursor-pointer flex item-center h-11 rounded px-2.5 " aria-hidden="true">

                                                <input type="date" class="form-control" name="date">
                                            </div>
                                            <div class="filter drop-shadow bg-white absolute top-11 w-full z-20 opacity-0 "></div>
                                        </div>
                                    </div>
                                    <div class="block suggestion-salon">
                                        <div class="mt-2">
                                            <div class="flex item-center " role="presentation">
                                                <div class="suggestion-salon__text jqr-name">
                                                    <div>TuấnAnh còn rất nhiều giờ trống vào ngày mai, click để đổi sang ngày mai anh nhé!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-time" id="box-time">
                                        <div class="relative">
                                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal" style=" overflow: auto">
                                                <div class="swiper-wrapper jqr-timesheet" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">

                                                </div>
                                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div id=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-affix-v2">
                        <div class="flex space-between text-center content-step time-line ">
                            <div class="right button-next pointer btn-inactive jqr-completed" role="presentation">
                                <span>Hoàn tất</span>
                            </div>
                            <span class="sub-description">Cắt xong trả tiền, huỷ lịch không sao</span>
                        </div>
                    </div>
                `);
                loadStylist();

            },
            error: function (error) {
                console.error(error);
            }
        });
    }


    function loadAllService() {
        arrayIDService = [];
        $.ajax({
            url: showService,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                let data = response.data;
                let imgService = response.service;
                // console.log(imgService)
                // console.log(response);
                let category = '';
                let countImg = 0;
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
                    for (let j = 0; j < count; j++) {
                        service += `
                                <div class="list__item">
                                    <div class="item__media " role="presentation">
                                       <img src="/storage/${imgService[countImg].images[0].url}" alt>
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
                                    <div class="item__button jqr-css" data-id="${data[i].service[j].id}" role="presentation">
                                    Chọn
                                    </div>
                                </div>
                                   `
                        countImg++
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


    let countSelect = 0;
    $(document).on('click', '.item__button', function () {
        let id = $(this).data('id');
        $(this).css({
            'background-color': '#91765a',
            'border': '1px solid #91765a',
            'color': '#fff',
        });

        if (!arrayIDService.includes(id)) {
            arrayIDService.push(id);
        } else {
            let index = arrayIDService.indexOf(id);
            if (index !== -1) {
                arrayIDService.splice(index, 1);
            }
            $(this).css({
                'background-color': '#fff',
                'border': '1px solid #91765a',
                'color': '#000',
            });
        }

        countSelect = arrayIDService.length;
        if (countSelect === 0) {
            $('.jqr-clickService').css({
                'background-color': '#fff',
                'border': '1px solid #91765a',
                'color': '#000',
            });
            $('.font-medium').html(`<div class="text-sm font-medium">Dịch vụ đã chọn: 0 dịch vụ</div>`)
            $('.jqr-clickService').html(`<span>Chọn dịch vụ</span>`);
        } else {
            $('.jqr-clickService').css({
                'background-color': '#91765a',
                'border': '1px solid #91765a',
                'color': '#fff',
            });
            $('.font-medium').html(`<div class="text-sm font-medium">Dịch vụ đã chọn: ${countSelect} dịch vụ</div>`);
            $('.jqr-clickService').html(`<span>Chọn ${countSelect} dịch vụ</span>`);
        }
    })
    let stylist = 0;
    $(document).on('click', '.jqr-detail', function () {
        stylist = $(this).data('id');
    })
    // $('.jqr-img').css({
    //     'border': '3px solid #f0b000',
    //     'width': '70px',
    //     'height': '70px',
    //     'border-radius': '50px',
    //     'margin': 'auto'
    // })
    let time = 0
    $(document).on('click', '.box-time_item', function () {
        time = $(this).data('id');
    })
    $(document).on('click', '.jqr-clickService', function () {
        mainBooking(arrayIDService);
    })

    $(document).on('click', '.jqr-completed', function () {
        pushRequest();
    })

    function pushRequest() {
        let special_requirement = 1;
        let is_consultant = 1;
        let is_accept_take_a_photo = 1;
        let date = $('input[name="date"]').val();
        let arrayBooking = {
            stylist : stylist,
            time : time,
            specialRequirement : special_requirement,
            is_consultant :is_consultant,
            isAcceptTakeAPhoto : is_accept_take_a_photo,
            date : date,
            arrayIDService: arrayIDService,
        };
        $.ajax({
            url: pullRequestUrl,
            method: 'POST',
            data: arrayBooking,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function (response) {
                console.log(response)
                toastr['success']('Đặt lịch thành công');

            },
            error: function (error){
                console.error(error);
            }
        });
    }
});
