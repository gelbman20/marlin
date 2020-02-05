'use strict';

if(document.querySelector('.alert-success')) {
  setTimeout(() => {
    document.querySelector('.alert-success').style.display = 'none';
  }, 3000)
}
