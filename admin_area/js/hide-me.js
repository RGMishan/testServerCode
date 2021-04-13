var side_bar = document.getElementById('hide-me');

side_bar.style.setProperty("display", "none", "important");

document.addEventListener('mousemove', (object) => {
    if (object.clientX <= 20) {
        side_bar.style.setProperty("display", "block", "important");
    }

    if (object.clientX > 255) {
        side_bar.style.setProperty("display", "none", "important");
    }
});

