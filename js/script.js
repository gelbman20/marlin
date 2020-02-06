'use strict';

/**
 * Alert
 */
if(document.querySelector('.alert-success')) {
  setTimeout(() => {
    document.querySelector('.alert-success').style.display = 'none';
  }, 3000)
}

/**
 * Form Validation
 */
const formComment = document.querySelector('.form-comment');
formComment.addEventListener('submit', function(event) {
	const name = formComment.querySelector('.form-comment-name');
	const message = formComment.querySelector('.form-comment-message');
	if  ( !name.value || !message.value ) {
		event.preventDefault();
		name.classList.add( 'is-invalid' );
		message.classList.add( 'is-invalid' );
	}
	
	if ( name.value ) name.classList.remove( 'is-invalid' );
	if ( message.value ) message.classList.remove( 'is-invalid' );
});