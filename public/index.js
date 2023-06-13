// ON CLICKING THE CARDS DETAILS BAR IS DISPLAYED
const myCards = document.getElementsByClassName("card");
const theDetails = document.getElementById("detail");
const closeDetail = document.getElementById("close-detail");
for (var i = 0; i < myCards.length; i++) {

    myCards[i].onclick = function () {
        theDetails.style.display = "block";
        closeDetail.style.display = "block";
    };

}

// ON CLICKING CLOSE THE DETAILS BAR IS CLOSED
closeDetail.onclick = function () {
    theDetails.style.display = "none";
    closeDetail.style.display = "none";
};

// TO DISPLAY SIDE NAVBAR
const menuBtn = document.getElementById("menu-bar");
const sideNav = document.getElementById("sidenav")

menuBtn.onclick = function () {
    // alert("The div was clicked!");
    sideNav.classList.add("show-sidenav");
}

// TO CLOSE SIDE NAVBAR
const menuLink = document.querySelectorAll('.menu-link')
const linkAction = () => {
    sideNav.classList.remove('show-sidenav')
}

menuLink.forEach(n => n.addEventListener('click', linkAction))