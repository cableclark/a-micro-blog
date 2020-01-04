 getImages () {
        let images = document.querySelectorAll(".drawer-image");

        images.forEach( (item) =>
            item.addEventListener('click', function () {
                console.log(this);
                })
        )
        return images;
    }
