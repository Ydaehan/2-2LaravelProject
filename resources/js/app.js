import './bootstrap';
import { Carousel } from 'flowbite';


const toggleBtn = document.getElementById('toggleBtn');
const popup = document.getElementById('popup');

// 부드러운 효과
const smooth = (tagId, time, visible) => {
  if (visible === 'block') {
    popup.style.display = visible;
    setTimeout(() => {
      tagId.style.transition = 'opacity 0.5s, transform 0.5s';
      tagId.style.opacity = 1;
      tagId.style.transform = 'translateY(0px)';
    }, time);
  } else {
    setTimeout(() => {
      popup.style.display = visible;
    }, time) // 500ms 지연 후 숨김
  }
}

// toggle click event
toggleBtn.addEventListener('click', function () {
  console.log('버튼이 클릭되었습니다!');
  const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
  toggleBtn.setAttribute('aria-expanded', !isExpanded);

  // 팝업의 가시성을 천천히 토글
  if (!isExpanded) {
    popup.style.opacity = 0;
    popup.style.transform = 'translateY(20px)';
    // 천천히 나타나기
    smooth(popup, 50, 'block');
  } else {
    // 천천히 사라지기
    popup.style.transition = 'opacity 0.5s, transform 0.5s';
    popup.style.opacity = 0;
    popup.style.transform = 'translateY(20px)';
    // transition 완료 후 숨김
    smooth(popup, 500, 'none');
  }
});

// login 관련
const $cancelBtn = document.getElementById('cancelBtn');
$cancelBtn.addEventListener('click', (e) => {
  e.preventDefault();
  window.location.href = '/';
})

// profile
