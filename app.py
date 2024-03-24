# app.py (Flask server)

from flask import Flask, request, jsonify
from llmAPI import get_suggestion

app = Flask(__name__)
print("jajajaaj")
@app.route('/brainstorm', methods=['POST'])
def brainstorm():
    print("jajajaaj")
    # Get the query from the AJAX request
    query = request.json['query']

    # Call get_suggestion function to generate AI suggestion
    suggestion = get_suggestion(query)

    # Return the suggestion
    return jsonify({'suggestion': suggestion})

if __name__ == '__main__':
    app.run(debug=True)
