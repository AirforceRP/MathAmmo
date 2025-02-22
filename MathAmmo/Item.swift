//
//  Item.swift
//  MathAmmo
//
//  Created by Luc Sun on 2/21/25.
//

import Foundation
import SwiftData

@Model
final class Item {
    var timestamp: Date
    
    init(timestamp: Date) {
        self.timestamp = timestamp
    }
}
