#include<bits/stdc++.h>
using namespace std;


void isUnique(int pot){
    bool match=false;

    if(pot<=9000){
        int num = pot;
        while (num >0)
        {   
            int last = num % 10; // 8
            int num1 = num /10;      // 198
            while (num1>0)
            {
                int check = num1 %10; // 8
                num1 = num1/10;       // 19
                if(last == check){
                    match=true;
                    break;
                }
            }

            if(match==false) {
                    break;
            }else{
                isUnique(pot+1);
                break;
            }
        }
        
        if(match==false){
            cout << pot << endl;
        }
    }
    


}



int main(){
    int num;
    cin >> num;
    isUnique(num);


    // if(isUnique(num)){
    //     cout << "YES Unique";
    // }else{
    //     cout << "No Unique";
    // }
    
    // int i = num;
    // while (1000<=i<=9000)
    // {   
    //     bool match;
    //     int last = num % 10; // 8
    //     num = num /10;       // 189
    //     int num1 = num;      // 189
    //     while (num1>0)
    //     {
    //         int check = num1 %10; // 9,8
    //         num1 = num1/10;       // 18,1
    //         if(last == check){
    //             match == true;
    //             break;
    //         }
    //     }
        
    //     if(match){
    //         break;
    //         cout << "YES";
    //     }else{
    //         cout << "NO";
    //     }
        
    // }


    return 0;
}