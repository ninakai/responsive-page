function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("column");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function adjustLayout() {
    var tabs = document.querySelector('.tabs');
    var columns = document.getElementsByClassName("column");
    if (window.innerWidth < 768) {
        tabs.style.display = "block";
        columns[1].style.display = "none";
        columns[2].style.display = "none";
    } else {
        tabs.style.display = "none";
        var columns = document.getElementsByClassName("column");
        columns[0].style.display = "block";
        columns[1].style.display = "block";
        columns[2].style.display = "block";
    }
}

// Show tabs if less than 600px, otherwise just columns
window.onload = adjustLayout;

// Add event listener for window resize
window.addEventListener('resize', adjustLayout);


