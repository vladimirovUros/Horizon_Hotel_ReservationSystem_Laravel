$(".single-pr-zvezdica").click(function () {
    var rating = $(this).attr("data-rating");
    let zvezdice = document.querySelectorAll('.single-pr-zvezdica');
    for (let i = 1; i <= rating; i++) {
        zvezdice[i - 1].classList.remove('praznaZvezdica');
        zvezdice[i - 1].classList.add('zvezdica');
    }
    for (let i = rating; i < 5; i++) {
        zvezdice[i].classList.remove('zvezdica');
        zvezdice[i].classList.add('praznaZvezdica');
    }
});
$(document).ready(function () {
    $(document).on("click", "#postComment", function (e) {
        e.preventDefault();
        var rating = $(".zvezdica").length;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var roomId = $(this).data("room-id");
        $.ajax({
            url: "/comment",
            method: "POST",
            data: {
                comment: $("#comment").val(),
                rating: rating,
                room_id: roomId,
            },
            success: function (data) {
                console.log(data);
                $(".commError").css("color", "green");
                $(".commError").html(data.msgSuccess);
                setTimeout(function () {
                    $(".commError").html("");
                }, 2000);
                console.log(data);
                let comment = document.getElementById("comment").value;
                let rating = document.querySelectorAll(".zvezdica");
                let alLReviews = document.querySelector("#allReviews");
                let commentLength = `${data.reviewID.comment}`;
                console.log(data.created_at);
                let date = new Date();
                const monthNames = [
                    "Jan", "Feb", "Mar",
                    "Apr", "May", "Jun", "Jul",
                    "Aug", "Sep", "Oct",
                    "Nov", "Dec",
                ];
                let year = date.getFullYear();
                let day = date.getDate();
                if (day < 10) {
                    day = '0' + day;
                }
                let monthIndex = date.getMonth();
                let formattedDate = `${day} ${monthNames[monthIndex]} ${year}`;
                let profileImageUrl;
                profileImageUrl = `http://localhost:8000/assets/img/users/${data.user.profile_image}`;
                let html = `
                <div class="single-room-review-area d-flex align-items-center">
                    <div class="reviwer-thumbnail">
                        <img src="${profileImageUrl}" alt="user image" />
                    </div>
                    <div class="reviwer-content">
                        <div class="reviwer-title-rating d-flex align-items-center justify-content-between">
                            <div class="reviwer-title">
                                <span>${formattedDate}</span>
                                <h6>${data.user.username}</h6>
                            </div>
                            <div class="reviwer-rating ${commentLength.length < 50 ? 'short-comment' : ''}">`;
                for (let i = 0; i < rating.length; i++) {
                    html += `<i class="fa fa-star"></i>`;
                }
                for (let j = rating.length; j < 5; j++) {
                    html += `<i class="fa fa-star praznaZvezdica"></i>`;
                }
                html += `
                        </div>
                        </div>
                        <p>${comment}</p>
                        <div class="edit-delete-icons">
                            <a class="editComment" data-id="${data.reviewID.id}"><i class="fa fa-edit edit-icon"></i></a>
                            <a class="deleteComment" data-id="${data.reviewID.id}"><i class="fa fa-trash delete-icon"></i></a>
                        </div>
                    </div>
                </div>`;
                alLReviews.innerHTML += html;
                document.getElementById("comment").value = "";
                let zvezdice = document.querySelectorAll(".single-pr-zvezdica");
                for (let i = 1; i <= zvezdice.length; i++) {
                    zvezdice[i - 1].classList.remove("zvezdica");
                    zvezdice[i - 1].classList.add("praznaZvezdica");
                }
                $(".deleteComment").click(function () {
                    $(this).parent().parent().parent().remove();
                });
                $("#noComment").hide();
            },
            error: function (data) {
                let html = "";
                if (data.responseJSON.errors) {
                    if (data.responseJSON.errors.comment) {
                        data.responseJSON.errors.comment.forEach(
                            function (element) {
                                html += element + "<br>";
                            },
                        );
                    }
                    if (data.responseJSON.errors.rating) {
                        data.responseJSON.errors.rating.forEach(
                            function (element) {
                                html += element + "<br>";
                            },
                        );
                    }
                }
                if (data.responseJSON.msgError) {
                    html += data.responseJSON.msgError;
                }
                $(".commError").css("color", "red");
                $(".commError").html(html);
                setTimeout(function () {
                    $(".commError").html("");
                }, 2000);
            },
        });
    });
});
$(document).on("click", ".deleteComment", function (e) {
    e.preventDefault();
    let reviewId = $(this).data("id");
    let parent = $(this).parent().parent().parent();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: "/comment/" + reviewId,
        method: "DELETE",
        success: function (data) {
            parent.remove();
            if ($("#allReviews .single-room-review-area").length === 0) {
                $("#allReviews").html(`<p id="noComment" class="font-weight-bold">No reviews yet</p>`);
            }
        },
        error: function (data) {
            console.log(data);
        },
    });
});
$(document).on("click", ".editComment", function (e) {
    e.preventDefault();
    let reviewDiv = $(this).parent().parent();
    let reviewComment = reviewDiv.find("p");
    let commentId = $(this).data("id");
    let reviewCommentText = reviewComment.text();
    reviewComment.remove();
    if ($(".edit-comment").length == 0) {
        console.log("aaaa")
        reviewDiv.find(".reviwer-title-rating").after(`
    <div class="edit-comment">
        <textarea class="edit-comment-textarea form-control" rows="3">${reviewCommentText}</textarea>
        <button class="saveEditBtn btn btn-success mt-2" data-id="${commentId}">Save</button>
        <button class="cancelEditBtn btn btn-danger mt-2" data-oldmessage="${reviewCommentText}">Cancel</button>
    </div>
`);
    }

});
$(document).on("click", ".cancelEditBtn", function (e) {
    e.preventDefault();
    let reviewDiv = $(this).closest(".single-room-review-area");
    let newReviewComment = $("<p>").text($(this).attr("data-oldmessage"));
    reviewDiv.find(".edit-comment").replaceWith(newReviewComment);
    if (!reviewDiv.find(".deleteComment").length) {
        reviewDiv.find(".edit-delete-icons").append(`<a class="deleteComment" data-id="${$(this).data("id")}"><i class="fa fa-trash delete-icon"></i></a>`);
    }
});
$(document).on("click", ".saveEditBtn", function (e) {
    e.preventDefault();
    let reviewDiv = $(this).closest(".single-room-review-area");
    let editedCommentTextarea = $(this).siblings(".edit-comment-textarea");
    let editedCommentText = editedCommentTextarea.val();
    let reviewId = $(this).data("id");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: "/comment/" + reviewId,
        method: "PUT",
        data: {
            comment: editedCommentText,
        },
        success: function (data) {
            let newReviewComment = $("<p>").text(editedCommentText);
            reviewDiv.find(".edit-comment").replaceWith(newReviewComment);
            if (!reviewDiv.find(".deleteComment").length) {
                reviewDiv.find(".edit-delete-icons").append(`<a class="deleteComment" data-id="${reviewId}"><i class="fa fa-trash delete-icon"></i></a>`);
            }
            $("#saveMessage").text(data.msgSuccess).css("color", "green");
            setTimeout(function () {
                $("#saveMessage").text("").css("color", "");
            }, 2000);
        },
        error: function (data) {
            let html = "";
            if (data.responseJSON.errors && data.responseJSON.errors.comment) {
                data.responseJSON.errors.comment.forEach(function (element) {
                    html += element + "<br>";
                });
            }
            if (data.responseJSON.msgError) {
                html += data.responseJSON.msgError;
            }
            $(".mesageError").css("color", "red"); ////!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
            $(".mesageError").html(html);
            setTimeout(function () {
                $(".commError").html("");
            }, 2000);
        }
    });
});
$(document).ready(function () {
    function getCSRFToken() {
        return $('meta[name="csrf-token"]').attr("content");
    }

    function sendNewsletter(email) {
        $.ajax({
            url: "/newsletter",
            method: "POST",
            data: {"emailNews": email},
            headers: {"X-CSRF-TOKEN": getCSRFToken()},
            success: handleNewsletterSuccess,
            error: handleNewsletterError
        });
    }

    function handleNewsletterSuccess(data) {
        $(".msgError").css("color", "green").html(data);
        setTimeout(() => $(".msgError").html(""), 2000);
    }

    function handleNewsletterError(data) {
        $(".msgError").css("color", "red").html(data.responseJSON.message);
        setTimeout(() => $(".msgError").html(""), 2000);
    }

    $(document).ready(function () {
        $(document).on("click", "#btnSendNews", function (e) {
            e.preventDefault();
            sendNewsletter($("#emailNews").val());
        });
    });

    function updateUserProfile(fullName, email, username, password) {
        $.ajax({
            url: "/updateProfile",
            method: "PUT",
            data: {
                username_fullname: fullName,
                email_user: email,
                username_user: username,
                username_password: password
            },
            headers: {"X-CSRF-TOKEN": getCSRFToken()},
            success: handleUserUpdateSuccess,
            error: handleUserUpdateError
        });
    }

    function handleUserUpdateSuccess(data) {
        $("#successEdit").html(data.msgSuccess).css("color", "green");
        setTimeout(() => $("#successEdit").html("").css("color", ""), 2000);
        var fullName = $("#username_fullname").val();
        var username = $("#username_user").val();
        $("#accFullName").html(fullName);
        $("#accUserName").html(username);
        $("#userName").html(username);
        $("#nameHide").html(username);
    }

    function handleUserUpdateError(xhr) {
        var response = JSON.parse(xhr.responseText);
        if (response.errors && response.errors.username_password) {
            $("#errorEditPassword").html(response.errors.username_password[0]).css('color', 'red');
            setTimeout(() => $("#errorEditPassword").html("").css('color', ''), 2000);
        } else {
            $("#errorEdit").html(response.message);
            if (response.errors && response.errors.username_fullname) {
                $("#errorEditFullName").html(response.errors.username_fullname[0]).css('color', 'red');
                setTimeout(() => $("#errorEditFullName").html("").css('color', 'red'), 2000);
            }
            if (response.errors && response.errors.email_user) {
                $("#errorEditEmail").html(response.errors.email_user[0]).css('color', 'red');
                setTimeout(() => $("#errorEditEmail").html("").css('color', ''), 2000);
            }
            if (response.errors && response.errors.username_user) {
                $("#errorEditUserName").html(response.errors.username_user[0]).css('color', 'red');
                setTimeout(() => $("#errorEditUserName").html("").css('color', ''), 2000);
            }
            if (response.errors && response.errors.username_password) {
                $("#errorEditPassword").html(response.errors.username_password[0]).css('color', 'red');
                setTimeout(() => $("#errorEditPassword").html("").css('color', ''), 2000);
            }
        }
    }

    $(document).on("click", "#editUser", function (e) {
        e.preventDefault();
        var fullName = $("#username_fullname").val();
        var email = $("#email_user").val();
        var username = $("#username_user").val();
        var password = $("#username_password").val();
        updateUserProfile(fullName, email, username, password);
    });
});


if ($("#togglePassword")) {
    $("#togglePassword").click(function () {
        var passwordField = document.getElementById("username_password");
        var icon = this.querySelector("i");
        if (passwordField.value) {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    });
}

$("#filterButton").click(function (e) {
    e.preventDefault();
    printRooms(1);
});

$(document).on("click", "#btnSubmit", function (e) {
    e.preventDefault();
    localStorage.setItem("filter", JSON.stringify({
        adults: $("#adults").val(),
        children: $("#children").val(),
        checkInDate: $("#checkInDate").val(),
        checkOutDate: $("#checkOutDate").val(),
    }));
    window.location.href = "/rooms";
});
if (window.location.pathname === "/rooms") {
    if (localStorage.getItem("filter")) {
        $("#roomContainer").html("");
        let filter = JSON.parse(localStorage.getItem("filter"));
        let niceSelectAdult = document.querySelector("#adults").parentElement.querySelector(".nice-select");
        let adultsLis = document.querySelector("#adults").parentElement.querySelectorAll("li");
        let currentAdults = niceSelectAdult.querySelector(".current");
        currentAdults.textContent = filter.adults;
        if (filter.adults === "0") {
            currentAdults.textContent = "None";
        } else {
            currentAdults.textContent = filter.adults;
        }
        adultsLis.forEach(function (li) {
            if (li.classList.contains("selected")) {
                li.classList.remove("selected");
            }
        });
        adultsLis.forEach(function (li) {
            let dataValue = li.getAttribute("data-value");
            if (dataValue === filter.adults) {
                li.classList.add("selected");
            }
        });
        let niceSelectChildren = document.querySelector("#children").parentElement.querySelector(".nice-select");
        let childrenLis = document.querySelector("#children").parentElement.querySelectorAll("li");
        let currentChildren = niceSelectChildren.querySelector(".current");
        currentChildren.textContent = filter.children;
        if (filter.children === "0") {
            currentChildren.textContent = "None";
        } else {
            currentChildren.textContent = filter.children;
        }
        childrenLis.forEach(function (li) {
            if (li.classList.contains("selected")) {
                li.classList.remove("selected");
            }
        });
        childrenLis.forEach(function (li) {
            let dataValue = li.getAttribute("data-value");
            if (dataValue === filter.children) {
                li.classList.add("selected");
            }
        });
        $("#checkInDate").val(filter.checkInDate);
        $("#checkOutDate").val(filter.checkOutDate);
        localStorage.removeItem("filter");
        let type = $("#roomType").val();
        let selectedBeds = [];
        $.each($("input[name='beds']:checked"), function () {
            selectedBeds.push($(this).val());
        });
        let adults = niceSelectAdult.querySelector(".selected").textContent;
        let children = niceSelectChildren.querySelector(".selected").textContent;
        let checkInDate = $("#checkInDate").val();
        let checkOutDate = $("#checkOutDate").val();
        let keyword = $("#keyword").val();
        let sort = $("#sort").val();
        let selectedServices = [];
        $.each($("input[name='services']:checked"), function () {
            selectedServices.push($(this).val());
        });
        $.ajax({
            url: "/room/filters",
            method: "GET",
            data: {
                page: 1,
                type: type,
                adults: adults,
                children: children,
                keyword: keyword,
                sort: sort,
                checkInDate: checkInDate,
                checkOutDate: checkOutDate,
                beds: selectedBeds,
                services: selectedServices,
            },
            success: function (data) {
                console.log(data);
                $("#roomContainer").empty();
                let html = "";
                data.data.forEach(
                    function (room) {
                        let roomImage = `http://localhost:8000/assets/img/rooms/${room.main_image_path}`;
                        html += `
                        <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            <div class="room-thumbnail">
                                <img src="${roomImage}" alt="" />
                            </div>
                            <div class="room-content">
                                <h2>${room.name}</h2>
                                <h4 class="font-weight-bold">${room.price[0].price}$ <span class="font-weight-bold">/ Night</span></h4>
                                <div class="room-feature">
                                 <h6 class="font-weight-bold">Size: <span>${room.size}m²</span></h6>
                                  <h6 class="font-weight-bold">Capacity:<span>${room.type.capacity} Persons</span></h6>
                                    <h6 class="font-weight-bold">Beds: `;
                        room.beds.forEach(function (bed) {
                            html += `<span>${bed.name}</span>`;
                        });
                        html += `</h6> <h6 class="font-weight-bold">Services:`;
                        let randomNums = [];
                        let j = 0;
                        while (randomNums.length < 3) {
                            let randomNum = Math.floor(Math.random() * room.services.length);
                            if (!randomNums.includes(randomNum)) {
                                randomNums.push(randomNum);
                            }
                        }
                        console.log(randomNums);
                        for (let i = 0; i < 2; i++) {
                            console.log(room.services[randomNums[i]]);
                            if (i === 1) {
                                html += `<span>${room.services[randomNums[i]].name}...</span>`;
                            } else {
                                html += `<span>${room.services[randomNums[i]].name}</span>`;
                            }
                        }
                        html += `</h6>
                                </div>
                                <a href="/room/${room.id}" class="btn view-detail-btn">View Details</a>
                            </div>
                        </div>`;
                    });
                $("#roomContainer").append(html);
                printpagination(data);
            },
            error: function (data) {
                if (data.responseJSON.datesError) {
                    $("#datesError").html(data.responseJSON.datesError);
                }
            }
        });
    }

    function printRooms(page) {
        let type = $("#roomType").val();
        let selectedBeds = [];
        $.each($("input[name='beds']:checked"), function () {
            selectedBeds.push($(this).val());
        });
        console.log(selectedBeds);
        let adults = $("#adults").parent().find(".selected").text();
        let children = $("#children").val();
        let checkInDate = $("#checkInDate").val();
        let checkOutDate = $("#checkOutDate").val();
        let keyword = $("#keyword").val();
        let sort = $("#sort").val();
        let selectedServices = [];
        $.each($("input[name='services']:checked"), function () {
            selectedServices.push($(this).val());
        });
        $.ajax({
            url: "/room/filters",
            method: "GET",
            data: {
                type: type,
                adults: adults,
                children: children,
                keyword: keyword,
                sort: sort,
                checkInDate: checkInDate,
                checkOutDate: checkOutDate,
                beds: selectedBeds,
                services: selectedServices,
                page: page,
            },
            success: function (data) {
                console.log(selectedBeds);
                console.log(data);
                $("#datesError").html("");
                $("#roomContainer").html("");
                let html = '';
                if (data.data.length > 0) {
                    data.data.forEach(
                        function (room) {
                            let roomImage = `http://localhost:8000/assets/img/rooms/${room.main_image_path}`;
                            html += `
                        <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            <div class="room-thumbnail">
                                <img src="${roomImage}" alt="" />
                            </div>
                            <div class="room-content">
                                <h2>${room.name}</h2>
                                <h4 class="font-weight-bold">${room.price[0].price}$ <span class="font-weight-bold">/ Night</span></h4>
                                <div class="room-feature">
                                 <h6 class="font-weight-bold">Size: <span>${room.size}m²</span></h6>
                                  <h6 class="font-weight-bold">Capacity:<span>${room.type.capacity} Persons</span></h6>
                                    <h6 class="font-weight-bold">Beds: `;
                            room.beds.forEach(function (bed) {
                                html += `<span>${bed.name}</span>`;
                            });
                            html += `</h6> <h6 class="font-weight-bold">Services:`;
                            let randomNums = [];
                            let j = 0;
                            while (randomNums.length < 3) {
                                let randomNum = Math.floor(Math.random() * room.services.length);
                                if (!randomNums.includes(randomNum)) {
                                    randomNums.push(randomNum);
                                }
                            }
                            console.log(randomNums);
                            for (let i = 0; i < 2; i++) {
                                console.log(room.services[randomNums[i]]);
                                if (i === 1) {
                                    html += `<span>${room.services[randomNums[i]].name}...</span>`;
                                } else {
                                    html += `<span>${room.services[randomNums[i]].name}</span>`;
                                }
                            }
                            html += `</h6>
                                </div>
                                <a href="/room/${room.id}" class="btn view-detail-btn">View Details</a>
                            </div>
                        </div>`;
                        });
                } else {
                    html = `<h2 class="text-danger">No rooms found for this criteria</h2><p class="text-info">Please try something else</p>`;
                }
                $("#roomContainer").append(html);
                printpagination(data);
            },
            error: function (data) {
                if (data.responseJSON.datesError) {
                    $("#datesError").html(data.responseJSON.datesError);
                }
            }
        });
    }

    function printpagination(data) {
        let currentPage = data.current_page;
        let lastPage = data.last_page;
        let html = `
     <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="300ms">
                        <ul class="pagination">`;
        if (lastPage > 1) {
            for (let i = 1; i <= lastPage; i++) {
                if (i === currentPage) {
                    html += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
                } else {
                    html += `<li class="page-item"><a class="page-link page-rooms" href="">${i}</a></li>`;
                }
            }
        }

        html += `</ul></nav>`;
        $("#roomContainer").append(html);
        $(".page-rooms").click(function (e) {
            e.preventDefault();
            let page = $(this).html();
            printRooms(page);
        });
    }

    $(".page-rooms").click(function (e) {
        e.preventDefault();
        let page = $(this).html();
        printRooms(page);
    });

}
//contact submit
$(document).ready(function () {
    $(document).on("click", "#sendMesssage", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/contact",
            method: "POST",
            data: {
                full_name: $("#full_name").val(),
                email: $("#email").val(),
                message: $("#message").val(),
            },
            success: function (data) {
                $("#contact").html(data.msgSuccess).css("color", "green");
                setTimeout(function () {
                    $("#contact").html("").css("color", "");
                }, 2000);
                $("#full_name").val("");
                $("#email").val("");
                $("#message").val("");
            },
            error: function (data) {
                if (data.responseJSON.errors) {
                    if (data.responseJSON.errors.full_name) {
                        $("#contactErrorFullName").html(data.responseJSON.errors.full_name[0]).css("color", "red");
                        setTimeout(function () {
                            $("#contactErrorFullName").html("").css("color", "");
                        }, 2000);
                    }
                    if (data.responseJSON.errors.email) {
                        $("#contactErrorEmail").html(data.responseJSON.errors.email[0]).css("color", "red");
                        setTimeout(function () {
                            $("#contactErrorEmail").html("").css("color", "");
                        }, 2000);
                    }
                    if (data.responseJSON.errors.message) {
                        $("#contactErrorMessage").html(data.responseJSON.errors.message[0]).css("color", "red");
                        setTimeout(function () {
                            $("#contactErrorMessage").html("").css("color", "");
                        }, 2000);
                    }
                }
            },
        });
    });
});
$("#checkAvailability").click(function (e) {
    e.preventDefault();
    if ($("#datesSuccess").html() !== "") {
        $("#datesSuccess").html("");
    }
    if ($("#datesError").html() !== "") {
        $("#datesError").html("");
    }
    let checkInDate = $('#checkInDate').val();
    let checkOutDate = $('#checkOutDate').val();
    let roomId = $('#roomId').val();
    $.ajax({
        url: "/room/check",
        method: "GET",
        data: {
            checkInDate: checkInDate,
            checkOutDate: checkOutDate,
            roomId: roomId
        },
        success: function (data) {
            if ($("#datesSuccess").html() == "") {
                $("#checkAvailability").hide();
                $("#datesSuccess").html(data.msgSuccess);
            }
            if (data.notice) {
                $("#notice").html(`<i class="fas fa-info-circle infoIcon"></i>` + data.notice);
            } else {
                console.log("usa");
                $(".hotel-reservation--area").append(`<div class="d-flex align-items-center justify-content-center"><button id="reserveButton" class="btn btn-primary">Reserve Now</button></div> `);
                $("#reserveButton").click(function () {
                    let html = `
             <div id="reservationModal">
                <form id="reservationForm">
                <div class="form-group">
                    <label for="full_name">Full name</label>
                    <input type="text" name="full_name" class="form-control" id="full_name">
                    <p id="fullNameError"></p>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                    <p id="phoneError"></p>
                </div>
                <div class="form-group">
                    <label for="checkInDate">Check In</label>
                    <input type="date" class="form-control" name="checkInDate" id="checkInDate" value="${checkInDate}">
                    <p id="dateFromError"></p>
                </div>
                <div class="form-group">
                    <label for="checkOutDate">Check Out</label>
                    <input type="date" class="form-control" name="checkOutDate" id="checkOutDate" value="${checkOutDate}">
                    <p id="dateToError"></p>
                </div>
                 <div class="form-group">
                    <label for="adults">Adults</label>
                   <select class="form-control" id="adults">
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                    </select>
                    <p id="adulstError"></p>
                </div>
                <div class="form-group">
                    <label for="children">Children</label>
                   <select class="form-control" id="children">
                      <option value="0">None</option>
                      <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                    </select>
                    <p id="childrenError"></p>
                </div>
                <p id="reservationBadError"></p>
                <p id="reservationSuccessMessage"></p>
                    <button type="submit" id="makeReservation" class="btn btn-primary">Make Reservation</button>
                </form>
            </div>
            `;
                    $(".modal .modal-body").html(html);
                    $(".modal").css("display", "block");
                    $("#closeModal").click(function () {
                        $(".modal").css("display", "none");
                    });
                    $('#makeReservation').click(function (e) {
                        e.preventDefault();
                        let roomId = $('#roomId').val();
                        let fullName = $('.modal #full_name').val();
                        let checkInDate = $('.modal #checkInDate').val();
                        let checkOutDate = $('.modal #checkOutDate').val();
                        let adults = $('.modal #adults').val();
                        let children = $('.modal #children').val();
                        let phone = $('.modal #phone').val();
                        $.ajaxSetup(
                            {
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            }
                        )
                        $.ajax({
                            type: 'POST',
                            url: '/room/reserve',
                            data: {
                                checkInDate: checkInDate,
                                checkOutDate: checkOutDate,
                                adults: adults,
                                children: children,
                                phone: phone,
                                fullName: fullName,
                                roomId: roomId
                            },
                            success: function (data) {
                                console.log(data.reservationSuccess)
                                if (data.reservationSuccess) {
                                    $(".modal").css("display", "none");
                                    $(".modal-body").html("");
                                    $(".modal-footer").html("");
                                    $(".modal-body").html(`<p class="text-success text-center">${data.reservationSuccess}</p>`);
                                    $(".modal").css("display", "block");
                                    setTimeout(function () {
                                        $(".modal").css("display", "none");
                                        $(".modal-body").html("");
                                        $(".modal-footer").html("");
                                        $("#checkInDate").val("");
                                        $("#checkOutDate").val("");
                                        $("#datesSuccess").html("");
                                        $("#reserveButton").remove();
                                        $("#checkAvailability").show();
                                    }, 2000);

                                }
                            },
                            error: function (data) {
                                if (data.responseJSON.errors) {
                                    if (data.responseJSON.errors.fullName) {
                                        $("#fullNameError").html(data.responseJSON.errors.fullName[0]).css("color", "red");
                                        setTimeout(function () {
                                            $("#fullNameError").html("").css("color", "");
                                        }, 4000);
                                    }
                                    if (data.responseJSON.errors.phone) {
                                        $("#phoneError").html(data.responseJSON.errors.phone[0]).css("color", "red");
                                        setTimeout(function () {
                                            $("#phoneError").html("").css("color", "");
                                        }, 4000);
                                    }
                                    if (data.responseJSON.errors.adults) {
                                        $("#adulstError").html(data.responseJSON.errors.adults[0]).css("color", "red");
                                        setTimeout(function () {
                                            $("#adulstError").html("").css("color", "");
                                        }, 4000);
                                    }
                                    if (data.responseJSON.errors.children) {
                                        $("#childrenError").html(data.responseJSON.errors.children[0]).css("color", "red");
                                        setTimeout(function () {
                                            $("#childrenError").html("").css("color", "");
                                        }, 4000);
                                    }
                                    if (data.responseJSON.errors.checkInDate) {
                                        $("#dateFromError").html(data.responseJSON.errors.checkInDate[0]).css("color", "red");
                                        setTimeout(function () {
                                            $("#dateFromError").html("").css("color", "");
                                        }, 4000);
                                    }
                                    if (data.responseJSON.errors.checkOutDate) {
                                        $("#dateToError").html(data.responseJSON.errors.checkOutDate[0]).css("color", "red");
                                        setTimeout(function () {
                                            $("#dateToError").html("").css("color", "");
                                        }, 4000);
                                    }
                                }
                                if (data.responseJSON.reservationError) {
                                    var errorMessage = data.responseJSON.reservationError;
                                    $("#reservationBadError").html(errorMessage).css("color", "red");
                                    setTimeout(function () {
                                        $("#reservationBadError").html("").css("color", "");
                                    }, 4000);
                                }
                            }
                        });
                    });
                });
            }
            $("#checkOutDate").change(function () {
                $("#datesSuccess").html("");
                if ($("#notice").html() !== "") {
                    $("#notice").html("");
                }
                $("#reserveButton").remove();
                $("#checkAvailability").show();
            });


        },
        error: function (data) {
            if (data.responseJSON.errors) {
                if (data.responseJSON.errors.checkInDate) {
                    $("#checkInError").html(data.responseJSON.errors.checkInDate[0]).css("color", "red");
                    setTimeout(function () {
                        $("#checkInError").html("").css("color", "");
                    }, 4000);
                }
                if (data.responseJSON.errors.checkOutDate) {
                    $("#checkOutError").html(data.responseJSON.errors.checkOutDate[0]).css("color", "red");
                    setTimeout(function () {
                        $("#checkOutError").html("").css("color", "");
                    }, 4000);
                }
            }
            if (data.responseJSON.msgError) {
                var errorMessage = data.responseJSON.msgError;
                $("#msgError").html(errorMessage).css("color", "red");
                setTimeout(function () {
                    $("#msgError").html("").css("color", "");
                }, 4000);
            }
        },
    });
});
$('#reserveButton').click(function () {
        $('#reservationModal').show();
    }
);
//cancel reservations info
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
// adminPanel();----------------------------------------------------------------------------------------
// $(document).ready(function () {
//     $("#allRooms").click(allRoomsAdmin);
// });
// function allRoomsAdmin(e){
//     e.preventDefault();
//     $.ajax({
//         url: "/admin/rooms",
//         method: "GET",
//         dataType: "json",
//         success: function (data) {
//             printPostAdmin(data);
//         },
//         error: function (data) {
//             console.log(data);
//         }
//     });
// }
// function printPostAdmin(data){
//     console.log(data);
// let print ='<h1>All rooms</h1>';
// print += `<table class="table table-striped">
// <tr><th>#ID</th><th>NAME</th><th>SIZE</th><th>DESCRIPTION</th><th>MAIN_IMAGE</th><th>AVG.RATING</th><th>NO OF COMMENTS</th><th>UPDATE</th><th>DELETE</th></tr>`
// for (let d of data.data){
//     let description = d.description.length > 100 ? d.description.substring(0, 100) + " ..." : d.description;
//     print += `<tr>
//     <td>${d.id}</td>
//     <td>${d.name}</td>
//     <td>${d.size}m<sup>2</sup></td>
//     <td>
//        <div class="description-container">
//            <span class="truncated-description">${description}</span>
//            <span class="info-icon" title="${d.description}">ℹ️</span>
//        </div>
//    </td>
//     <td>${d.main_image_path}</td>
//     <td>
//          ${calculateAverageRating(d.reviews)}
//     </td>
//     <td>
//         ${d.reviews.length === 0 ? 'No comments' : d.reviews.length}
//     </td>
//     <td><a href="#" class="updateRoom" data-id="${d.id}">Update</a></td>
//     <td><a href="#" class="deleteRoom" data-id="${d.id}">Delete</a></td>
//     </tr>`;
// }
// print += `</table>`;
// print += `<div class="pagination">`;
// for (let i = 1; i <= data.last_page; i++) {
//     print += `<a href="#" class="pagination-link" ${data.current_page === i ? 'active' : " "} data-id="${i}">${i}</a>`;
// }
// print += `</div>`;
// $("#mainAdmin").html(print);
// $(".deleteRoom").click(deleteRoom);
// $(".updateRoom").click(updateRoom);
$(".info-icon").hover(function () {
    $(this).tooltip({
        show: null,
        position: {
            my: "left top",
            at: "right+5 top-5"
        },
        open: function (event, ui) {
            ui.tooltip.animate({top: ui.tooltip.position().top + 10}, "fast");
        }
    });
    $(this).tooltip("show");
}, function () {
    $(this).tooltip("hide");
});

//brisanje sobe
$(document).ready(function () {
    $(".deleteRoom").on("click", function (e) {
        e.preventDefault();
        let roomId = $(this).data("id");
        console.log(roomId);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        if (confirm("Are you sure you want to delete this room?")) {
            $.ajax({
                url: "/admin/rooms/" + {roomId},
                method: "DELETE",
                success: function (response) {
                    console.log(response)
                    // window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
// [
// hiljadu okruglo
