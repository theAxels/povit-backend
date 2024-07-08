    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-analytics.js";
    import { getAuth, createUserWithEmailAndPassword, GoogleAuthProvider, signInWithPopup, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-auth.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    const firebaseConfig = {
        apiKey: "AIzaSyBxtqymOnQBquDrCV4CHJxE0LFbzUvn25k",
        authDomain: "povit-webprog.firebaseapp.com",
        databaseURL: "https://povit-webprog-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "povit-webprog",
        storageBucket: "povit-webprog.appspot.com",
        messagingSenderId: "91749867818",
        appId: "1:91749867818:web:a4d49c6857d1019d827e53",
        measurementId: "G-317Q6LQ25E"
    };
    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
  
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        validateInputs();

        try {
        const userCredential = await signInWithEmailAndPassword(auth, email.value.trim(), password.value.trim());
        // Signed in
        const user = userCredential.user;
        console.log(user);

        // Handle successful login (redirect, etc.)
        } catch (error) {
        const errorCode = error.code;
        const errorMessage = error.message;

        if (errorCode === 'auth/wrong-password') {
            setError(password, 'Invalid email or password.');
        } else if (errorCode === 'auth/user-not-found') {
            setError(email, 'User not found. Please create an account.');
        } else {
            setError(email, 'Login failed. Please try again.');
            console.error(errorMessage);  // Log detailed error for debugging
        }
        }
    });

    const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    };

    const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    };

    const isValidEmail = (email) => {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(String(email).toLowerCase());
    };

    const validateInputs = () => {
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();

        if (emailValue === '') {
            setError(email, 'Email is required');
        } else if (!isValidEmail(emailValue)) {
            setError(email, 'Invalid! Please enter an email address that includes @ and ends in .com.');
        } else {
            setSuccess(email);
        }

        if (passwordValue === '') {
            setError(password, 'Password is required');
        } else if (passwordValue.length < 8) {
            setError(password, 'Password must be at least 8 characters long');
        } else {
            setSuccess(password);
        }
    };
});
