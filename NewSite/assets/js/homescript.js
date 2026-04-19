
const topImage = document.getElementById("topImage");

    window.addEventListener("scroll", () => {
    const scrollTop = window.scrollY;
    const maxScroll = document.body.scrollHeight - window.innerHeight;

    let progress = scrollTop / maxScroll;

    // convert to percentage
    let percent = 100 - (progress * 100);

    // reveal from bottom
    topImage.style.clipPath = `inset(${percent}% 0 0 0)`;
});
