const accordionContent = document.querySelectorAll(".accordion-content");

accordionContent.forEach((item, index) => {
    let header = item.querySelector(".accordion-content header");
    header.addEventListener("click", () => {
        item.classList.toggle("open");

        let description = item.querySelector(".accordion-desc");
        if (item.classList.contains("open")) {
            description.style.height = `${description.scrollHeight}px`;
            item.querySelector("i").classList.replace("ri-arrow-down-s-fill", "ri-arrow-up-s-fill");
        } else {
            description.style.height = "0px";
            item.querySelector("i").classList.replace("ri-arrow-up-s-fill", "ri-arrow-down-s-fill");
        }
        removeOpen(index);
    });
});

function removeOpen(index1) {
    accordionContent.forEach((item2, index2) => {
        if (index1 != index2) {
            item2.classList.remove("open");

            let des = item2.querySelector(".accordion-desc");
            des.style.height = "0px";
            item2.querySelector("i").classList.replace("ri-arrow-up-s-fill", "ri-arrow-down-s-fill");
        }
    });
}