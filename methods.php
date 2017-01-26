
ConnectivityManager connectivityManager = (ConnectivityManager) getSystemService(this.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connectivityManager.getActiveNetworkInfo();

        if(networkInfo != null && networkInfo.isConnected()){
            new HttpTask().execute();
        }else{
            Toast.makeText(getApplicationContext(), "Network not available", Toast.LENGTH_LENGTH).show();
        }
