const express = require('express');
const bodyParser = require('body-parser');
const bcrypt = require('bcrypt');

const app = express();
const PORT = 3000;

// In-memory user database (for demonstration purposes)
const users = [
    {
        username: 'example',
        password: '$2b$10$RzVy0GrOnUZpARxYew6jG./CoRbNLMjMRQVURFdRJ0TC7iepLMVpa', // Hashed "password"
    },
];

app.use(bodyParser.json());
app.use(express.static('public'));

app.post('/login', (req, res) => {
    const { username, password } = req.body;

    const user = users.find(user => user.username === username);

    if (user && bcrypt.compareSync(password, user.password)) {
        res.json({ success: true, message: 'Login successful!' });
    } else {
        res.json({ success: false, message: 'Invalid username or password. Please try again.' });
    }
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
