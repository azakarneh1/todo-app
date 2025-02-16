import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';

let userId = document.querySelector('meta[name="user-id"]').content;
console.log(userId);
window.Echo.channel('notification.' + userId)
    .listen('NotificationEvent', (event) => {
        console.log('New notification:', event.message);

        let notificationItem = `
            <div class="p-2 bg-gray-100 border-b border-gray-200">
                <p class="text-sm text-gray-700">${event.message}</p>
            </div>
        `;

        $('#notifications-container').prepend(notificationItem);
        $('#no-notifications').hide();
    });

