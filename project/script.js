document.addEventListener('DOMContentLoaded', function () {
  const sidebarItems = document.querySelectorAll('.glass-sidebar a');

  let nearBy = [];
  const angles = Array.from({ length: 360 }, (_, i) => (i * Math.PI) / 180);
  const offset = 10;

  sidebarItems.forEach((item) => {
    item.onmouseleave = () => {
      item.style.background = 'transparent';
      item.style.borderImage = null;
      item.style.borderRadius = '10px'; // Adjusted border-radius for the sidebar
      item.style.transition = 'background 0.3s, border-radius 0.3s'; // Added transition for a smoother effect
    };

    item.onmouseenter = () => {
      clearNearBy();
      item.style.borderRadius = '0';
    };

    item.addEventListener('mousemove', (e) => {
      item.style.border = '1px solid transparent';
      const rect = item.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      item.style.background = `radial-gradient(circle at ${x}px ${y}px , rgba(255,255,255,0.25),rgba(255,255,255,0) )`;
      item.style.borderImage = `radial-gradient(20% 65% at ${x}px ${y}px ,rgba(255,255,255,0.7),rgba(255,255,255,0.7),rgba(255,255,255,0.1) ) 9 / 2px / 0px stretch `;
      item.style.borderRadius = '10px'; // Adjusted border-radius for the sidebar
      item.style.transition = 'background 0.3s, border-radius 0.3s';
    });
  });

  const clearNearBy = () => {
    nearBy.forEach((element) => {
      element.style.borderImage = null;
      element.style.transition = 'border-image 0.3s';
    });
    nearBy = [];
  };

  const sidebar = document.querySelector('.glass-sidebar');

  sidebar.addEventListener('mousemove', (e) => {
    const x = e.x;
    const y = e.y;

    clearNearBy();

    nearBy = angles.reduce((acc, rad) => {
      const cx = Math.floor(x + Math.cos(rad) * offset);
      const cy = Math.floor(y + Math.sin(rad) * offset);
      const element = document.elementFromPoint(cx, cy);

      if (element !== null && element.tagName === 'A' && element.classList.contains('glass-sidebar')) {
        const bx = x - element.getBoundingClientRect().left;
        const by = y - element.getBoundingClientRect().top;

        if (!element.style.borderImage) {
          element.style.borderImage = `radial-gradient(${offset * 2}px ${offset * 2}px at ${bx}px ${by}px ,rgba(255,255,255,0.7),rgba(255,255,255,0.1),transparent ) 9 / 1px / 0px stretch `;
          element.style.transition = 'border-image 0.3s';
        }

        return [...acc, element];
      }
      return acc;
    }, []);
  });

  sidebar.onmouseleave = () => {
    clearNearBy();
  };
});
