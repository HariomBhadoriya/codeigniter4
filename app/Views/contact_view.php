
<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>
    <title>Contact Us</title>
    <style>
       

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: rgb(255, 255, 255);
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid rgb(230, 230, 230);
            border-radius: 5px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
.back-button-link {
  text-decoration: none;
}

.back-button {
  background-color: #343a40; /* Dark gray */
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.back-button:hover {
  background-color: #495057; /* Slightly lighter gray */
  transform: translateY(-2px);
}

.back-button:active {
  transform: translateY(0);
  background-color: #212529;
}

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-messages {
            color: red;
            margin-bottom: 15px;
        }
    </style>

    <h2>Contact Us</h2>

    <?php if(isset($validation)): ?>
        <div class="error-messages">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('contact/store') ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= set_value('name') ?>">

        <label for="mobile">Mobile Number:</label>
        <input type="text" name="mobile" value="<?= set_value('mobile') ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= set_value('email') ?>">

        <label for="subject">Subject:</label>
        <input type="text" name="subject" value="<?= set_value('subject') ?>">

        <label for="message">Message:</label>
        <textarea name="message"><?= set_value('message') ?></textarea>

        <input type="submit" value="Submit">
    </form>
    <a href="<?= site_url('dashboard') ?>" class="back-button-link">
  <button class="back-button">← Back</button>
</a>

    <?= $this->endSection() ?>

