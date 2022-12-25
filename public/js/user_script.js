function showLogoutBtn() {
    document.getElementById('LogoutBtn').classList.toggle('showLogout');
}

window.onclick = function (event) {
    let LogoutBtn = document.getElementById('LogoutBtn');
    if (event.target != document.getElementById('Logout')) {
        LogoutBtn.classList.remove('showLogout');
    }
}

if (document.body.contains(document.getElementById("slide_0"))) {
    let Radio = document.getElementsByClassName('slider_radio');
    let ActiveIndex = 0;
    for (let i = 0; i < Radio.length; i++) {
        if (Radio[i].checked) {
            ActiveIndex = i;
        }
    }

    CardSelected(ActiveIndex);
}

function changeSlide(value) {
    let Radio = document.getElementsByClassName('slider_radio');
    let ActiveIndex = 0;
    for (let i = 0; i < Radio.length; i++) {
        if (Radio[i].checked) {
            ActiveIndex = i;
        }
    }
    Radio[ActiveIndex].checked = false;
    ActiveIndex += value;
    Radio[ActiveIndex].checked = true;
    console.log(ActiveIndex);

    CardSelected(ActiveIndex);
}

function CardSelected(ActiveIndex) {

    let Radio = document.getElementsByClassName('slider_radio');
    let Cards = document.getElementsByClassName('slider-item');

    Cards[ActiveIndex].className = "slider-item active-slider";

    if (ActiveIndex == 0) {
        document.getElementById('prevBtn').style.display = 'none';
    }
    else {
        document.getElementById('prevBtn').style.display = 'flex';
    }
    if (ActiveIndex == Radio.length - 1) {
        document.getElementById('nextBtn').style.display = 'none';
    }
    else {
        document.getElementById('nextBtn').style.display = 'flex';
    }
    if (ActiveIndex > 0) {
        let left1 = ActiveIndex - 1;

        Cards[left1].className = "slider-item slider-item-left1";

        if (ActiveIndex > 1) {
            let left2 = ActiveIndex - 2;

            for (let i = 0; i < left2; i++) {
                Cards[i].className = "slider-item hidden-slide-left";
            }

            Cards[left2].className = "slider-item slider-item-left2";
        }
    }

    if (ActiveIndex < Radio.length - 1) {
        let right1 = ActiveIndex + 1;

        Cards[right1].className = "slider-item slider-item-right1";

        if (ActiveIndex < Radio.length - 2) {
            let right2 = ActiveIndex + 2;

            for (let i = right2 + 1; i < Radio.length; i++) {
                Cards[i].className = "slider-item hidden-slide-right";
            }

            Cards[right2].className = "slider-item slider-item-right2";
        }
    }

}

function thisSelected(SelectedIndex) {
    let capsters = document.getElementsByClassName('capster-choice');

    for (let i = 0; i < capsters.length; i++) {
        capsters[i].className = "capster-choice";
    }
    capsters[SelectedIndex].className = "capster-choice selected-capster";
}

function showProfile() {
    document.getElementById("activitySection").className = "profile-option";
    document.getElementById("activityMenu").className = "profile-menu-container";
    document.getElementById("profileSection").className = "profile-option selected-profile-option";
    document.getElementById("profileMenu").className = "profile-menu-container active-profile-menu";
}

function showActivities() {
    document.getElementById("profileSection").className = "profile-option";
    document.getElementById("profileMenu").className = "profile-menu-container";
    document.getElementById("activitySection").className = "profile-option selected-profile-option";
    document.getElementById("activityMenu").className = "profile-menu-container active-profile-menu";
}

function showCancelModal(ID) {
    let OrderID = document.getElementById('orderID');
    OrderID.value = ID;
    document.getElementById('CancelModal').style.display = "flex";
}

function closeCancelModal() {
    document.getElementById('CancelModal').style.display = "none";
}
if (document.body.contains(document.getElementById("CancelModal"))) {
    window.onclick = function (event) {
        if (event.target == document.getElementById('CancelModal')) {
            closeCancelModal();
        }
    }
}


function showExperience(scale) {
    let ExperienceScale = document.getElementById('experience');
    switch (scale) {
        case 1:
            ExperienceScale.innerText = 'This is terrible';
            break;
        case 2:
            ExperienceScale.innerText = 'This is bad';
            break;
        case 3:
            ExperienceScale.innerText = 'This is OK';
            break;
        case 4:
            ExperienceScale.innerText = 'This is good';
            break;
        case 5:
            ExperienceScale.innerText = 'This is amazing';
            break;
        default:
            ExperienceScale.innerText = '';
    }
}

function showReviewModal(ID) {
    let OrderID = document.getElementById('OrderID');
    OrderID.value = ID;
    document.getElementById('ReviewModal').style.display = "flex";
}
function closeReviewModal() {
    document.getElementById('ReviewModal').style.display = "none";
}
