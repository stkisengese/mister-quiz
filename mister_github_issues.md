# GitHub Issues for Mister Quiz Project

## Issue #1: Fix Login Authentication
**Priority:** High  
**Labels:** bug, authentication

### Description
The login functionality is not properly implemented. The `LoginController@store` method only redirects to home without validating credentials.

### Current Problem
```php
public function store(Request $request)
{
    return redirect()->route('home');
}
```

### Requirements
- Validate email and password fields
- Authenticate user credentials against database
- Handle invalid login attempts with error messages
- Redirect authenticated users to homepage
- Display appropriate error messages for invalid credentials

### Acceptance Criteria
- [x] User can login with valid email/password combination
- [x] Invalid credentials show error message "These credentials do not match our records"
- [x] Form validation works for required fields
- [x] User is redirected to homepage after successful login
- [x] User session is properly established

### Implementation Details
```php
public function store(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return back()->with('status', 'Invalid login details');
    }

    return redirect()->route('home');
}
```

---

## Issue #2: Complete Profile Page Implementation
**Priority:** Medium  
**Labels:** feature, user-profile

### Description
The profile page is missing key functionality to display user statistics and rank system.

### Current Problem
Profile controller has empty arrays and missing rank calculation logic.

### Requirements
- Display user's rank based on XP thresholds
- Show percentage of correct answers for each category
- Display number of correct/total answers per category
- Calculate and show overall statistics

### Acceptance Criteria
- [x] User rank displays correctly based on XP:
  - < 1500 XP => "Quiz Apprentice"
  - 1500-5000 XP => "Average Quizer"  
  - 5000-10000 XP => "Epic Quizer"
  - >= 10000 XP => "Quiz Master"
- [x] Category statistics show correct format (x/y)
- [x] Percentages are calculated and displayed
- [x] Only authenticated users can access their profile

### Implementation Details
```php
public function index()
{
    $user = Auth::user();
    
    // Calculate rank
    $rank = match(true) {
        $user->xp < 1500 => 'Quiz Apprentice',
        $user->xp < 5000 => 'Average Quizer',
        $user->xp < 10000 => 'Epic Quizer',
        default => 'Quiz Master'
    };
    
    // Parse category scores
    $categories = ['art', 'geography', 'history', 'science', 'sports'];
    $stats = [];
    
    foreach ($categories as $category) {
        [$correct, $total] = explode('/', $user->$category);
        $percentage = $total > 0 ? round(($correct / $total) * 100, 1) : 0;
        $stats[$category] = [
            'correct' => $correct,
            'total' => $total,
            'percentage' => $percentage
        ];
    }
    
    return view('profile', compact('user', 'rank', 'stats'));
}
```

---

## Issue #3: Implement Leaderboard Feature
**Priority:** Medium  
**Labels:** feature, leaderboard

### Description
The leaderboard page is empty and needs to display top 10 players ranked by XP.

### Current Problem
The leaderboard view only contains empty table tags.

### Requirements
- Display top 10 users ordered by XP (highest first)
- Show username, XP amount, and total correct answers
- Calculate total correct answers across all categories
- Style the table appropriately

### Acceptance Criteria
- [x] Leaderboard shows top 10 users by XP
- [x] Table includes: Username, XP, Total Correct Answers
- [x] Total correct answers calculated from all category scores
- [x] Proper styling and responsive design
- [x] Handle case when less than 10 users exist

### Implementation Details

**Controller:**
```php
public function index()
{
    $users = User::orderBy('xp', 'desc')
        ->take(10)
        ->get()
        ->map(function ($user) {
            $totalCorrect = 0;
            $categories = ['art', 'geography', 'history', 'science', 'sports'];
            
            foreach ($categories as $category) {
                [$correct] = explode('/', $user->$category);
                $totalCorrect += (int) $correct;
            }
            
            $user->total_correct = $totalCorrect;
            return $user;
        });

    return view('leaderboard', compact('users'));
}
```

**View Update:**
```blade
<table class="leaderboard-table">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>XP</th>
            <th>Total Correct</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->xp }}</td>
            <td>{{ $user->total_correct }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
```

---

## Issue #4: Add CSS Styling and Assets
**Priority:** Medium  
**Labels:** design, frontend

### Description
The application is missing CSS styles and the main quiz image referenced in views.

### Current Problem
- `resources/css/app.css` is empty
- Missing `public/css/app.css` compiled file
- Missing `public/images/mister_quiz.png`
- Views reference CSS classes that don't exist

### Requirements
- Create comprehensive CSS styling
- Add the missing quiz logo image
- Ensure responsive design
- Style all form elements, buttons, and layouts

### Acceptance Criteria
- [ ] All pages are properly styled
- [ ] Responsive design works on mobile/tablet
- [ ] Quiz logo displays correctly
- [ ] Form styling is consistent
- [ ] Button hover effects work
- [ ] Color scheme is consistent throughout

### CSS Classes Needed
Based on view files, implement these classes:
- `.title`, `.form-header`
- `.auth-input`, `.center`
- `.green-btn`, `.red-btn`, `.blue-btn`
- `.error-msg`, `.simple-link`
- `.top-right-corner`, `.top-left-corner`, `.bottom-right-corner`
- `.main-img`, `.profile-header`, `.profile-name`, `.profile-email`, `.profile-xp`
- `.content`, `.checkboxes-wrapper`, `.checkbox`
- `.results-wrapper`, `.result`
- `.leaderboard-table`

---

## Issue #5: Fix Quiz Form Validation
**Priority:** High  
**Labels:** bug, validation

### Description
The quiz submission needs proper validation to ensure all questions are answered before submission.

### Current Problem
The form allows submission without answering all questions, and there's no client-side validation.

### Requirements
- Validate that all questions have been answered
- Show error message if questions are missing
- Prevent form submission until all questions answered
- Add JavaScript validation for better UX

### Acceptance Criteria
- [ ] Form cannot be submitted with unanswered questions
- [ ] Clear error message shown for missing answers
- [ ] JavaScript validation provides instant feedback
- [ ] Server-side validation as backup
- [ ] User-friendly error handling

### Implementation Details

**Add to QuestionController@results:**
```php
public function results(Request $request)
{
    $quiz = Quiz::where('id', $request->quiz)->first();
    $questions = $quiz->getQuestions();
    
    // Validate all questions are answered
    foreach ($questions as $question) {
        if (!$request->has((string)$question->id)) {
            return back()->withErrors(['incomplete' => 'Please answer all questions before submitting.']);
        }
    }
    
    // Rest of the existing logic...
}
```

**Add JavaScript validation:**
```javascript
document.querySelector('form').addEventListener('submit', function(e) {
    const radios = document.querySelectorAll('input[type="radio"]');
    const questions = new Set();
    const answered = new Set();
    
    radios.forEach(radio => {
        questions.add(radio.name);
        if (radio.checked) {
            answered.add(radio.name);
        }
    });
    
    if (questions.size !== answered.size) {
        e.preventDefault();
        alert('Please answer all questions before submitting.');
    }
});
```

---

## Issue #6: Add Authentication Middleware
**Priority:** High  
**Labels:** security, middleware

### Description
Protected routes (profile, quiz) need authentication middleware to prevent unauthorized access.

### Current Problem
Users can access profile and quiz pages without being logged in, causing potential errors.

### Requirements
- Add auth middleware to protected routes
- Redirect unauthenticated users to login page
- Ensure proper access control

### Acceptance Criteria
- [ ] Profile page requires authentication
- [ ] Quiz routes require authentication  
- [ ] Proper redirect to login page
- [ ] Maintain intended URL after login

### Implementation Details

**Update routes/web.php:**
```php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/quiz', [QuestionController::class, 'index'])->name('quiz');
    Route::post('/quiz/submit', [QuestionController::class, 'results'])->name('quiz.submit');
});
```

---

## Issue #7: Database Seeding and Sample Data
**Priority:** Low  
**Labels:** database, setup

### Description
The application needs sample questions and answers for testing and demonstration.

### Requirements
- Create seeders for questions and answers
- Add sample data for all 5 categories
- Ensure proper XP values for questions
- Create factory for generating test data

### Acceptance Criteria
- [ ] At least 4 questions per category (20 total minimum)
- [ ] Each question has 4 answer options
- [ ] Proper XP distribution (50-200 points per question)
- [ ] Seeder can be run multiple times safely

### Implementation Details

**Create Question Seeder:**
```bash
php artisan make:seeder QuestionSeeder
php artisan make:seeder AnswerSeeder
```

**Sample seeder structure:**
```php
$questions = [
    [
        'question' => 'Which artist painted the Mona Lisa?',
        'category' => 'Art',
        'xp' => 100,
        'answers' => [
            ['answer' => 'Leonardo da Vinci', 'correct' => true],
            ['answer' => 'Pablo Picasso', 'correct' => false],
            ['answer' => 'Vincent van Gogh', 'correct' => false],
            ['answer' => 'Michelangelo', 'correct' => false]
        ]
    ],
    // ... more questions
];
```

---

## Issue #8: Error Handling and User Experience
**Priority:** Medium  
**Labels:** enhancement, ux

### Description
Improve error handling and user experience throughout the application.

### Requirements
- Add proper error pages (404, 500)
- Improve form validation messages
- Add loading states for quiz submission
- Better feedback for user actions

### Acceptance Criteria
- [ ] Custom 404 and 500 error pages
- [ ] Consistent error message styling
- [ ] Loading indicators for async operations
- [ ] Success messages for completed actions
- [ ] Proper form field focus and validation states

---

## Getting Started

1. **Setup Environment:**
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

2. **Database Setup:**
   ```bash
   php artisan migrate
   php artisan db:seed  # After implementing seeders
   ```

3. **Compile Assets:**
   ```bash
   npm install
   npm run dev
   ```

4. **Serve Application:**
   ```bash
   php artisan serve
   ```

## Priority Order
1. Issue #1: Fix Login Authentication
2. Issue #5: Fix Quiz Form Validation  
3. Issue #6: Add Authentication Middleware
4. Issue #2: Complete Profile Page Implementation
5. Issue #3: Implement Leaderboard Feature
6. Issue #4: Add CSS Styling and Assets
7. Issue #7: Database Seeding and Sample Data
8. Issue #8: Error Handling and User Experience