import './bootstrap';
import { Modal,Carousel } from 'flowbite';


const toggleBtn = document.getElementById('toggleBtn');
const popup = document.getElementById('popup');

// toggle click event
toggleBtn.addEventListener('click', function() {
    console.log('버튼이 클릭되었습니다!');
    const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

    toggleBtn.setAttribute('aria-expanded', !isExpanded);
    
    // 팝업의 가시성을 천천히 토글
    if (!isExpanded) {
        popup.style.opacity = 0;
        popup.style.transform = 'translateY(20px)';
        popup.style.display = 'block';

        // 천천히 나타나기
        setTimeout(() => {
            popup.style.transition = 'opacity 0.5s, transform 0.5s';
            popup.style.opacity = 1;
            popup.style.transform = 'translateY(0px)';
        }, 100); // 50ms 지연 후 트랜지션 시작
    } else {
        // 천천히 사라지기
        popup.style.transition = 'opacity 0.5s, transform 0.5s';
        popup.style.opacity = 0;
        popup.style.transform = 'translateY(20px)';

        // transition 완료 후 숨김
        setTimeout(() => {
            popup.style.display = 'none';
        }, 500) // 500ms 지연 후 숨김
    }
});

// login 관련
const $openLoginModal = document.getElementById('loginBtn');
const $loginModal = document.getElementById('loginModal');
const $loginBtn = document.getElementById('btnLogin');
const $cancelBtn = document.getElementById('btnCancel');

const modal = new Modal($loginModal);
const $modalOut = document.getElementById('modalOut');

$openLoginModal.addEventListener('click', () => {
  modal.show();
})

$loginBtn.addEventListener('click',() => {
  modal.hide();
})

$cancelBtn.addEventListener('click',() => {
  modal.hide();
})

$modalOut.addEventListener('click', (e) => {
  if($modalOut === e.target) {
    modal.hide();
  }
})
// carousel 관련
const carousel = new Carousel();