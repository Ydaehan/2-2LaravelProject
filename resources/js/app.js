import './bootstrap';
import { Carousel } from 'flowbite';

// login 관련
const $cancelBtn = document.getElementById('cancelBtn');
$cancelBtn.addEventListener('click', (e) => {
  e.preventDefault();
  window.location.href = '/';
})

