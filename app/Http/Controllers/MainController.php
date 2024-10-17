<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\File;
use App\Models\Products;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Utilities\Rectangle;
use App\Utilities\BankAccount;
use App\Utilities\Triangle;
use App\Utilities\a_rectangle;
use App\Utilities\DemoConstructor;
use App\Utilities\BaseClass;
use App\Utilities\ChildClass;
use App\Utilities\OverloadExample;







class MainController extends Controller
{
    public function registration_data(Request $req)
    {
        $data = $req->all();
        return view('print_registration_data', compact('data'));
    }

    // tutorial 1: question 3
    public function printPrime()
    {
        $primeNumbers = [];
        for ($i = 2; $i <= 100; $i++) {
            $isPrime = true;
            for ($j = 2; $j < $i; $j++) {
                if ($i % $j == 0) {
                    $isPrime = false;
                    break;
                }
            }
            if ($isPrime) {
                $primeNumbers[] = $i;
            }
        }
        $sum = 0;
        for ($j = 0; $j < count($primeNumbers); $j++) {
            # code...
            $sum += $primeNumbers[$j];
        }
        $primeNumbersString = implode(', ', $primeNumbers);
        return view('prime_number', compact('primeNumbersString', 'sum'));
    }

    // tutorial 1:quesion 4
    public function calculateMod(Request $request)
    {
        $n1 = $request->input('num1');
        $n2 = $request->input('num2');
        $result = $this->calculate($n1, $n2);
        return view('moduls', ['result' => $result]);
    }

    public function calculate($divident, $divisior)
    {
        if ($divisior == 0) {
            return "cant devide by 0";
        } else {
            $rem = $divident;
            while ($rem >= $divisior) {
                $rem = $rem - $divisior;
            }
            return $rem;
        }
    }

    // tutorial 1 question 5
    public function multiplicationTable(Request $request)
    {
        $n = $request->input('number');
        return view('MultiplicationTable', compact('n'));
    }


    // t2.1
    public function dynamic_textbox(Request $req)
    {
        $num = $req->input('num');
        return view('dynamic_textbox', compact('num'));
    }

    public function print_sorted_value(Request $req)
    {
        $fields = $req->all();
        sort($fields);
        return view('dynamic_textbox', compact('fields'));
    }

    // t2.2
    public function upload(Request $req)
    {
        $file = $req->file('file');
        $file_name = $file->getClientOriginalName();
        $req->validate(
            [
                'file' => 'required|mimes:pdf|max:2048'
            ]

        );
        $file->move('uploads/', $file_name);
        return view('upload_pdf', compact('file_name'));
    }

    //t2.3
    public function sum_of_digit(Request $req)
    {
        $num = $req->input('num');
        $sum = 0;
        while ($num > 0) {
            $sum = $sum + $num % 10;
            $num = $num / 10;
        }
        return view('sum_of_digit', compact('sum'));
    }

    //t2.4
    public function maximum(Request $req)
    {
        $num = $req->input('num');
        return view('maximum', compact('num'));
    }

    public function print_sorted_maximum(Request $req)
    {
        $fields = $req->all();
        rsort($fields);
        $max1 = $fields[0];
        $max2 = $fields[1];
        $max3 = $fields[2];
        $ans = [$max1, $max2, $max3];
        return view('maximum', compact('ans'));
    }

    // t2.5
    public function right_angle_triangle(Request $req)
    {
        $side_1 = $req->input('side_1');
        $side_2 = $req->input('side_2');
        $side_3 = $req->input('side_3');
        $result = "";
        if (isset($side_1) && isset($side_2) && isset($side_3)) {

            if ($side_1 * $side_1 + $side_2 * $side_2 == $side_3 * $side_3 || $side_1 * $side_1 + $side_3 * $side_3 == $side_2 * $side_2 || $side_2 * $side_2 + $side_3 * $side_3 == $side_1 * $side_1) {
                // echo " a right triangle.";
                $result = "a right triangle.";
            } else {
                // echo "not form a right triangle.";
                $result = "not a right triangle.";
            }
        }

        return view('right_angle_triangle', compact('result'));
    }

    // t3.1
    public function upload_file(Request $req)
    {
        $file = $req->file('file');
        $files = $file->getClientOriginalName();
        $req->validate(
            [
                'file' => 'required|max:2048'
            ]

        );
        if ($file->move('uploads/', $files)) {
            $files_name = File::allFiles('uploads');
            return view('files', compact('files_name'));
        }

        // return view('files',compact('files_name'));
    }

    public function files()
    {
        $files_name = File::allFiles('uploads');
        return view('files', compact('files_name'));
    }

    public function download_file($file_name)
    {
        $path = "uploads/" . $file_name;
        return response()->download($path);
    }

    public function delete_file($file_name)
    {
        $path = "uploads/" . $file_name;
        if (File::delete($path)) {
            $files_name = File::allFiles('uploads');
            return view('files', compact('files_name'));
        } else {
            echo "error in delete";
        }
    }


    // t4
    public function show_product_form()
    {
        $product_details = Products::all();
        return view('product_form', compact('product_details'));
    }

    public function product_insert(Request $req)
    {
        // $req->validate(
        //     [
        //         'name'=>'required',
        //         'price'=>'required',
        //         'description'=>'required',
        //     ],
        //     [
        //         'name.required'=>'name is required',
        //         'price.required'=>'price is required',
        //         'description.required'=>'description is required',
        //     ]
        //     );
        $product = new Products;
        $product->p_name = $req->p_name;
        $product->p_price = $req->p_price;
        $product->p_description = $req->p_description;

        if ($product->save()) {
            session()->flash("insert", "product inserted");
            return redirect('product_form');
        } else {
            session()->flash("del", "product not inserted");
        }
    }
    // product delete
    public function product_delete($id)
    {
        $product = Products::find($id);
        if ($product->delete()) {
            session()->flash("del", "product deleted");
            return redirect('product_form');
        }
    }
    // product update
    public function product_update($id, Request $req)
    {
        $product = Products::find($id);
        $product_details = Products::all();
        return view('product_form', compact('product', 'product_details'));
    }

    public function update_form($id)
    {
        $product_data = Products::find($id);
        return view('product_form', compact('product_data'));
    }
    public function product_update_details($id, Request $req)
    {
        $product = Products::find($id);
        $product->p_name = $req->p_name;
        $product->p_price = $req->p_price;
        $product->p_description = $req->p_description;
        if ($product->save());
        return redirect('product_form');
    }



    // t5

    public function register_view()
    {
        return view('register');
    }

    public function register_user(Request $req)
    {

        $data = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:register,userEmail',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Added validation for profile picture
        ], [
            'email.unique' => 'this email is alredy registered'
        ]);

        if ($data->fails()) {
            Log::error('Validation failed', ['errors' => $data->errors()]);
            return redirect()->route('register')->withErrors($data)->withInput();
        }

        $registerModel = new Register();
        $registerModel->userName = $req->name;
        $registerModel->userEmail = $req->email;
        $registerModel->userPass = Hash::make($req->password);

        // Handle profile picture upload
        if ($req->hasFile('profile_picture')) {
            $file = $req->file('profile_picture');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/profile_pictures/' . $fileName; // Create the path
            $file->move(public_path('uploads/profile_pictures'), $fileName); // Save the file
            $registerModel->profileImage = $filePath; // Store the path in the database
        }

        if ($registerModel->save()) {
            return redirect()->route('/')->with('registered', 'Your email has been registered. Now you can login.');
        } else {
            return redirect()->back()->with('error', 'Error in registration');
        }
    }

    public function check_login(Request $req)
    {
        // Validate the request data
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = Register::where('userEmail', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->userPass)) {
            $req->session()->put('user', $user);
            session()->put('user_email', $user->userEmail);
            session()->put('user_id', $user->id);

            return redirect()->route('home')->with('success', 'Login successful!');
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'password' => 'The provided password does not match our records.',
        ])->withInput();
        echo "hello";
    }

    public function logout()
    {
        session()->flush();
        session()->flash('logout', 'logout successfully');
        return redirect()->route('/');
    }


    function profile_view()
    {
        $userData = Register::find(session('user_id'));
        // echo $userData;
        return view('profile', compact('userData'));
    }

    public function updateProfile($id, Request $req)
    {
        // Validate the request data with matching field names from the form
        $data = Validator::make($req->all(), [
            'username' => 'required|string|max:255', // Match 'username' with form input
            'email' => 'required|string|email|max:255|unique:register,userEmail,' . $id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Match 'profile_image' with form input
        ], [
            'email.unique' => 'This email is already registered'
        ]);

        // Check if validation fails
        if ($data->fails()) {
            return redirect()->back()->withErrors($data)->withInput();
        }

        // Fetch user data
        $userData = Register::find($id);
        $userData->userName = $req->username; // Use 'username' from form input
        $userData->userEmail = $req->email;

        // Handle profile image upload
        if ($req->hasFile('profile_image')) {
            $file = $req->file('profile_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/profile_pictures/' . $fileName; // Create the path
            $file->move(public_path('uploads/profile_pictures'), $fileName); // Save the file
            $userData->profileImage = $filePath; // Store the path in the database
        }

        // Save updated data
        if ($userData->save()) {
            session()->flash("updated", "Profile updated successfully.");
            return redirect()->route('profile_view')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Error in updating profile');
        }
    }

    function changePasswordview()
    {
        return view('change_password');
    }


    public function update_password(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Fetch the current user
        $user = Register::find(session('user_id'));

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->userPass)) {
            return redirect()->route('profile_view')->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the new password
        $user->userPass = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile_view')->with('success', 'Password changed successfully.');
    }

    function delete_profile()
    {
        $userId = session('user_id');
        $user = Register::find($userId);

        if ($user) {
            $user->delete();
            session()->flush();
            session()->flash("deleted", "Profile deleted successfully.");
            return redirect()->route('/')->with('success', 'Profile deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }


    // t7


    public function t7_1()
    {
        return view('t7_1');
    }

    public function cal_area(Request $req)
    {
        $rectangle = new Rectangle($req->length, $req->width);

        $area = $rectangle->area();
        $perimeter = $rectangle->perimeter();

        return view('t7_1', compact('area', 'perimeter'));
    }


    public function t7_2()
    {
        $account = new BankAccount('12345', 1000); // Initialize with account number and balance

        // Return view with form and initial balance
        return view('t7_2', ['account' => $account]);
    }

    // Method to manage deposit and withdrawal operations
    public function manageAccount(Request $request)
    {
        $account = new BankAccount('12345', $request->balance); // Use hidden field for balance

        // Determine the action and perform the operation
        if ($request->has('deposit')) {
            $message = "Deposited " . $request->amount . " successfully to account " . $account->getAccountNumber();
            $account->deposit($request->amount);
        } elseif ($request->has('withdraw')) {
            $message = "Withdrew " . $request->amount . " successfully from account " . $account->getAccountNumber();
            $account->withdraw($request->amount);
        } else {
            $message = "Invalid operation.";
        }

        // Flash message with deposit/withdrawal status and account number
        session()->flash('status', $message);

        // Redirect back to the form with updated balance
        return redirect()->route('t7_2');
    }


    public function t7_3()
    {
        return view('t7_3');
    }

    public function calculateShapes()
    {

        $triangle = new Triangle(10, 5);
        $triangleArea = $triangle->calculateArea();

        $rectangle = new a_rectangle(10, 5);
        $rectangleArea = $rectangle->calculateArea();

        // Return the results in a view or as a response
        return view('t7_3', [
            'triangleArea' => $triangleArea,
            'rectangleArea' => $rectangleArea,
        ]);
    }

    public function t7_4()
    {
        return view('t7_4');
    }

    public function handleClick(Request $request)
    {
        // Create an instance of DemoConstructor
        $demo = new DemoConstructor($request->name, $request->age);

        // Get the details from the class
        $details = $demo->getDetails();

        // Return view with the result
        return view('t7_4', ['details' => $details]);
    }

    public function demonstrateInheritance()
    {
        // Instantiate the BaseClass and ChildClass
        $baseObject = new BaseClass('BaseObject');
        $childObject = new ChildClass('ChildObject');

        // Get messages from both classes
        $baseName = $baseObject->getName();
        $baseMessage = $baseObject->displayMessage();

        $childName = $childObject->getName();
        $childMessage = $childObject->displayMessage();
        $parentMessageFromChild = $childObject->callParentMessage();

        // Pass the values to the view
        return view('t7_5', [
            'baseName' => $baseName,
            'baseMessage' => $baseMessage,
            'childName' => $childName,
            'childMessage' => $childMessage,
            'parentMessageFromChild' => $parentMessageFromChild,
        ]);
    }


    public function demonstrateOverloading()
    {
        // Create an instance of OverloadExample class
        $overloadExample = new OverloadExample();

        // Demonstrate calling sum method with two arguments
        $resultTwoNumbers = $overloadExample->sum(10, 20);

        // Demonstrate calling sum method with three arguments
        $resultThreeNumbers = $overloadExample->sum(10, 20, 30);

        // Demonstrate invalid number of arguments
        $resultInvalid = $overloadExample->sum(10);

        // Pass results to the view
        return view('t7_6', [
            'resultTwoNumbers' => $resultTwoNumbers,
            'resultThreeNumbers' => $resultThreeNumbers,
            'resultInvalid' => $resultInvalid,
        ]);
    }
}
