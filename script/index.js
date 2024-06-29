let toggleInterval = true;
const ids = ['image-1', 'image-2', 'image-3'];
const indicators = ['indicator-1', 'indicator-2', 'indicator-3']
let interval

const startInterval = () => {
    let currentId = 0;
    document.getElementById(ids[currentId]).style.opacity = '1'
    document.getElementById(indicators[currentId]).style.background = '#ffffff'
    document.getElementById(indicators[currentId]).style.opacity = '1'
    
    interval = setInterval(function() {
        currentId += 1;
        
        if( currentId === 3) {
            currentId = 0
        }
    
        document.getElementById(ids[currentId]).style.opacity = '1'
        document.getElementById(indicators[currentId]).style.background = '#ffffff'
        document.getElementById(indicators[currentId]).style.opacity = '1'
    
        ids.forEach((item) => {
            if(item !== ids[currentId]){
                document.getElementById(item).style.opacity = '0'
            }
        });
    
        indicators.forEach((item) => {
            if(item !== indicators[currentId]){
                document.getElementById(item).style.background = '#E8E7E7'
                document.getElementById(item).style.opacity = '0.5'
            }
        });
    }, 10000);
}

startInterval();

const selectLatestPost = (id) => {
    clearInterval(interval);
    const imageId = `image-${id}`;
    const indicatorId = `indicator-${id}`;

    document.getElementById(imageId).style.opacity = '1'
    document.getElementById(indicatorId).style.background = '#ffffff'
    document.getElementById(indicatorId).style.opacity = '1'

    ids.forEach((item) => {
        if(item !== imageId){
            document.getElementById(item).style.opacity = '0'
        }
    });

    indicators.forEach((item) => {
        if(item !== indicatorId){
            document.getElementById(item).style.background = '#E8E7E7'
            document.getElementById(item).style.opacity = '0.5'
        }
    });

    setTimeout(() => {
        startInterval()
    }, 5000);
}

const constan = [
    {
        id: 'search-box',
        class: 'search-active'
    },
    {
        id: 'dropdown-menu-list',
        class: 'dropdown-active'
    }
];

const checkActive = (activeClass) => {
    const getOtherClass = constan.filter(item => item.class !== activeClass).map(data => {
        const otherActive = document.getElementsByClassName(data.class);
        if(otherActive.item(0)){
            return {
                ...data,
                active: true
            }
        } else {
            return {
                ...data,
                active: false
            }
        }
    }).some(finalData => finalData.active);
    
    return getOtherClass
}

const toggleClass = (id, activeClass) => {
    const menuActive = document.getElementById(id);
    if(checkActive(activeClass)){
        menuActive.style.transition = 'none';
    } else {
        menuActive.style.transition = 'all 0.3s ease';
    }
    menuActive.classList.toggle(activeClass);


    const dropdownActive = document.getElementsByClassName(activeClass);
    if(dropdownActive.item(0)){
        document.body.style.overflowY = 'hidden';
    } else {
        document.body.style.overflowY = 'auto';
    }
    
    constan.forEach((item) => {
        const otherActive = document.getElementsByClassName(item.class);
        if(item.class !== activeClass && otherActive.item(0)){
            const otherMenuActive = document.getElementById(item.id);
            otherMenuActive.classList.toggle(item.class);
            if(otherActive.item(0)){
                document.body.style.overflowY = 'hidden';
            } else {
                if(checkActive(item.class)){
                    document.body.style.overflowY = 'hidden';
                } else {
                    document.body.style.overflowY = 'auto';
                }
            }
        }
    });
}

