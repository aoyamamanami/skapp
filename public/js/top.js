const CLASSNAME = "-visible";
const TIMEOUT = 1500;
const $target = $(".title");

setInterval(() => {
  $target.addClass(CLASSNAME);
  setTimeout(() => {
    $target.removeClass(CLASSNAME);
  }, TIMEOUT);
}, TIMEOUT * 2);

const postContentElements = document.querySelectorAll('.post-content');

postContentElements.forEach((postContentElement) => {
  const postImgElement = postContentElement.querySelector('.post-img');

  postContentElement.addEventListener('mouseover', () => {
    postImgElement.classList.add('post-img-hover');
  });

  postContentElement.addEventListener('mouseout', () => {
    postImgElement.classList.remove('post-img-hover');
  });
});