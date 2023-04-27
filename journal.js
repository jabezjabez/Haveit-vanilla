const itemIcons = document.querySelectorAll('.item-icons');

itemIcons.forEach((icons) => {
  icons.addEventListener('mouseover', () => {
    icons.style.opacity = '1';
  });

  icons.addEventListener('mouseout', () => {
    icons.style.opacity = '0';
  });
});
