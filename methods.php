
URL url;
            HttpURLConnection connection;
            try {
                url = new URL(params[0]);
                connection = (HttpURLConnection) url.openConnection();

                if (params[1].equals("POST")) {
                    connection.setRequestMethod("POST");
                    JSONObject data = new JSONObject();
                    data.put("Users_ID", "1");
                    data.put("BrandName", params[2]);
                    data.put("Category", params[3]);
                    data.put("Description", params[4]);
                    data.put("RatingCount", "0");
                    data.put("AverageRating", "0.0");
                    data.put("Address", params[5]);
                    data.put("City", params[6]);
                    data.put("PostCode", params[7]);

                    connection.setDoInput(true);
                    connection.setDoOutput(true);
                    connection.setRequestProperty("Content-Type", "application/json");

                    if (data != null) {
                        DataOutputStream outputStream = new DataOutputStream(connection.getOutputStream());
                        outputStream.writeBytes(data.toString());
                        outputStream.flush();
                        outputStream.close();
                    }
                    int responseCode = connection.getResponseCode();

                }else{
                    finish();
                }

            } catch(Exception e){
                e.printStackTrace();
            }
            return null;
