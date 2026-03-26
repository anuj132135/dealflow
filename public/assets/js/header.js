const profile = document.getElementById("profileavtar");
const profilelist = document.getElementById("profilelist");

profile.addEventListener("click", () => {
    if (
        profilelist.style.display === "none" ||
        profilelist.style.display === ""
    ) {
        profilelist.style.display = "flex";
    } else {
        profilelist.style.display = "none";
    }
});

document.querySelector(".maximize").onclick = () => {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
};

// show greeting >>>>>>

const hour = new Date().getHours();
let text;

if (hour >= 4 && hour <= 11) {
    text = "Morning";
} else if (hour >= 12 && hour <= 15) {
    text = "Afternoon";
} else if (hour >= 16 && hour <= 19) {
    text = "Evening";
} else {
    text = "Night";
}
document.querySelector("#greet").textContent = text;

