
#  Certificate Validation System – OceanWP Child Theme

This project is a custom **WordPress child theme** built on top of the OceanWP theme. It allows users to validate certificates on the frontend using a **Certificate ID** and **Student Name**, and redirects them to a pre-designed certificate page if the data is valid.

---

##  Features

- AJAX-based certificate validation (no page reload)
- Custom form with styled input and validation button
- Redirects user to the certificate page upon successful match
- Uses **ACF (Advanced Custom Fields)** to manage certificate data
- Works with a custom post type `student_certificate`
- Clean UI, styled via the child theme’s `style.css`

---

##  What's Included

```
oceanwp-child-certificate/
│
├── functions.php               # Contains backend logic and AJAX handlers
├── style.css                   # Custom styling for form layout
├── js/
│   └── jQuery_custom.js        # AJAX-based form handler
├── README.md                   # This documentation file
```

---

##  Installation Instructions

### 1. Upload Theme
1. Log in to your WordPress dashboard
2. Go to **Appearance > Themes > Add New > Upload Theme**
3. Upload the `oceanwp-child-certificate.zip` file
4. Activate the theme

### 2. Install Required Plugins
- **Advanced Custom Fields (ACF)** – Required for managing custom fields on the certificate post
- (Optional) **Custom Post Type UI** – If you're not registering the `student_certificate` post type manually

---

##  Admin Instructions

1. Navigate to **Custom Post Type > Student Certificates** (or wherever you create certificates).
2. For each certificate, enter data using the ACF fields:
   - Name
   - Father’s Name
   - Course Enrolled
   - From Date / To Date
   - Grade
   - Marks
   - Certificate Number (`certificate_no`)

 Make sure the `certificate_no` and `name` fields are filled in correctly – these are used to validate the certificate on the frontend.

---

##  Frontend Usage

1. Use the shortcode or include the form HTML on a public page.
2. User enters:
   - Student Name
   - Certificate ID
3. If valid, the user is redirected to the certificate’s post/page.
4. If invalid, an error is shown via AJAX (no reload).

---

##  Example Frontend Page

URL: `https://yourdomain.com/validate-certificate/`

This page should include your certificate validation form. You can customize this page or its styling further using OceanWP and the child theme CSS.

---

##  Notes

- Ensure your certificate post uses a proper **template** or **ACF field group** to render the certificate visually as you designed.
- This solution does **not yet** include QR code functionality. You can add it later if needed using plugins or a PHP QR library.

---


