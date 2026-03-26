# Gourmet Haven Restaurant Website

A modern, responsive restaurant website built with HTML, CSS, JavaScript, and PHP.

## Features

- **Home Page**: Hero section with call-to-action and about section
- **Menu Page**: Interactive menu cards showcasing featured dishes
- **Gallery Page**: Image gallery with lightbox functionality
- **Reservations Page**: Reservation form with validation and PHP backend
- **Contact Page**: Contact information and embedded map
- **Responsive Design**: Mobile-friendly layout with hamburger navigation

## Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP for form processing
- **Styling**: Custom CSS with CSS Grid and Flexbox
- **Images**: Unsplash API for high-quality food images

## File Structure

```
restaurant-web/
├── index.html          # Home page
├── menu.html           # Menu page
├── gallery.html        # Gallery page
├── reservations.html   # Reservations page
├── contact.html        # Contact page
├── process_reservation.php  # PHP backend for reservations
└── reservations.json   # JSON file to store booking data
```

## Setup Instructions

1. **Web Server**: This website requires a PHP-enabled web server (Apache, Nginx, etc.)
2. **File Permissions**: Ensure the web server has write permissions to create/update `reservations.json`
3. **Open in Browser**: Navigate to `index.html` in your web browser

## Features Implemented

### Frontend Features
- ✅ Interactive menu cards with hover effects
- ✅ Image gallery with lightbox modal
- ✅ Responsive design for all screen sizes
- ✅ Smooth scrolling navigation
- ✅ Mobile hamburger menu

### Backend Features
- ✅ Reservation form validation (client-side)
- ✅ PHP form processing with server-side validation
- ✅ JSON file storage for booking details
- ✅ AJAX form submission for better UX

### Skills Assessed
- ✅ Forms: HTML form with validation
- ✅ Responsive design: CSS media queries and flexible layouts
- ✅ PHP backend: Server-side processing and data storage

## Browser Support

- Chrome/Edge (recommended)
- Firefox
- Safari
- Mobile browsers

## Notes

- Images are loaded from Unsplash (requires internet connection)
- Reservation data is stored locally in `reservations.json`
- For production use, consider implementing a proper database (MySQL, PostgreSQL, etc.)