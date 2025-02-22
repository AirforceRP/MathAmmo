import Foundation

struct LessonContent {
    static let allLessons: [String: [String: [LessonStep]]] = [
        "Addition": [
            "Basics": [
                LessonStep(
                    title: "Understanding Addition",
                    content: "Addition is combining numbers together to find their total. When we add numbers, we're counting how many things we have altogether. For example, if you have 2 apples and get 3 more, you'll have 5 apples in total.",
                    example: "2 + 3 = 5",
                    practice: ["2 + 3 = ?", "3 + 4 = ?"]
                ),
                LessonStep(
                    title: "Adding Zero",
                    content: "When you add zero to any number, the number stays the same. Zero means 'nothing', so adding it doesn't change the total.",
                    example: "4 + 0 = 4",
                    practice: ["5 + 0 = ?", "0 + 6 = ?"]
                ),
                LessonStep(
                    title: "Number Line Addition",
                    content: "We can use a number line to help us add. Start at the first number and count forward by the second number.",
                    example: "3 + 4 = 7",
                    practice: ["3 + 2 = ?", "2 + 4 = ?"]
                )
            ],
            
            "Adding Tens": [
                LessonStep(
                    title: "Adding Single Digits",
                    content: "When adding numbers up to 10, think about making tens. For example, 7 + 3: First make 10, then you're done!",
                    example: "7 + 3 = 10",
                    practice: ["6 + 4 = ?", "8 + 2 = ?"]
                ),
                LessonStep(
                    title: "Making Tens",
                    content: "Finding pairs of numbers that add up to 10 is a helpful skill. For example, 5 + 5 = 10, 6 + 4 = 10, and 7 + 3 = 10.",
                    example: "9 + 1 = 10",
                    practice: ["5 + 5 = ?", "7 + 3 = ?"]
                ),
                LessonStep(
                    title: "Adding Teen Numbers",
                    content: "When adding teen numbers, first add the tens, then the ones. For example, 13 + 4: Think 13, then count up 4 more.",
                    example: "13 + 4 = 17",
                    practice: ["12 + 3 = ?", "11 + 5 = ?"]
                )
            ],
            
            "Advanced": [
                LessonStep(
                    title: "Two-Digit Addition",
                    content: "When adding two-digit numbers, break them into tens and ones. Add the tens first, then the ones.",
                    example: "23 + 45 = 68\nTens: 20 + 40 = 60\nOnes: 3 + 5 = 8\n60 + 8 = 68",
                    practice: ["21 + 34 = ?", "42 + 25 = ?"]
                ),
                LessonStep(
                    title: "Adding Three Numbers",
                    content: "When adding three numbers, look for pairs that make 10 first. This makes the calculation easier.",
                    example: "5 + 3 + 2 = 10\n(5 + 5 = 10)",
                    practice: ["4 + 3 + 3 = ?", "2 + 5 + 3 = ?"]
                ),
                LessonStep(
                    title: "Mental Math Strategies",
                    content: "Use different strategies like: making tens, doubles (6 + 6), near doubles (6 + 7), or adding up to a friendly number.",
                    example: "8 + 7 = 15\n(8 + 2 = 10, then add 5 more)",
                    practice: ["7 + 6 = ?", "9 + 5 = ?"]
                )
            ],
            
            "Word Problems": [
                LessonStep(
                    title: "Simple Word Problems",
                    content: "Word problems help us use addition in real situations. Look for key words like 'total', 'sum', 'altogether', or 'more'.",
                    example: "Tom has 5 marbles. Sara gives him 3 more marbles.\nHow many marbles does Tom have now?\n5 + 3 = 8 marbles",
                    practice: [
                        "You have 4 apples and find 2 more. How many apples do you have now?",
                        "There are 3 cats and 5 dogs in the park. How many animals are there in total?"
                    ]
                ),
                LessonStep(
                    title: "Multi-Step Problems",
                    content: "Some problems need more than one step to solve. Break the problem into smaller parts.",
                    example: "You have 3 red balloons, 2 blue balloons, and 4 green balloons.\nHow many balloons do you have in total?\n3 + 2 = 5, then 5 + 4 = 9 balloons",
                    practice: [
                        "You have 2 pencils in your desk, 3 in your bag, and 1 in your pocket. How many pencils do you have altogether?",
                        "There are 4 birds in a tree. 2 more birds join them, then 3 more arrive. How many birds are there now?"
                    ]
                ),
                LessonStep(
                    title: "Money Problems",
                    content: "Adding money is just like adding regular numbers. Keep track of dollars and cents separately.",
                    example: "You have $5 and earn $3 more.\nHow much money do you have now?\n$5 + $3 = $8",
                    practice: [
                        "You have $6 and find $4. How much money do you have now?",
                        "Mom gives you $2 and Dad gives you $5. How much money did you get?"
                    ]
                )
            ]
        ],
        "Multiplication": [
            "Basic": [
                LessonStep(
                    title: "Understanding Multiplication",
                    content: "Multiplication is repeated addition. When we multiply 3 × 4, we're adding 3 four times.",
                    example: "3 × 4 = 3 + 3 + 3 + 3 = 12",
                    practice: ["2 × 3 = ?", "4 × 2 = ?"]
                ),
                // Add more steps...
            ]
        ],
        // Add more topics...
    ]
} 